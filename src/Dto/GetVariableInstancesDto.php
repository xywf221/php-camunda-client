<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetVariableInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by variable instance name.
     */
    public ?string $variableName;

    /**
     * @var string|null Filter by the variable instance name. The parameter can include the wildcard `%` to
     * express like-strategy such as: starts with (`%`name), ends with (name`%`) or
     * contains (`%`name`%`).
     */
    public ?string $variableNameLike;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated
     * process instance ids.
     */
    public ?string $processInstanceIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated
     * execution ids.
     */
    public ?string $executionIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated case instance ids.
     */
    public ?string $caseInstanceIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated case execution ids.
     */
    public ?string $caseExecutionIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated task
     * ids.
     */
    public ?string $taskIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated
     * batch ids.
     */
    public ?string $batchIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated
     * activity instance ids.
     */
    public ?string $activityInstanceIdIn;

    /**
     * @var string|null Only include variable instances which belong to one of the passed and comma-separated
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var string|null Only include variable instances that have the certain values.
     * Value filtering expressions are comma-separated and are structured as
     * follows:
     *
     * A valid parameter value has the form `key_operator_value`.
     * `key` is the variable name, `operator` is the comparison operator to be used
     * and `value` the variable value.
     **Note:** Values are always treated as `String` objects on server side.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to; `gt` -
     * greater than;
     * `gteq` - greater than or equal to; `lt` - lower than; `lteq` - lower than or
     * equal to;
     * `like`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $variableValues;

    /**
     * @var bool|null Match all variable names provided in `variableValues` case-insensitively. If set to `true`
     **variableName** and **variablename** are treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match all variable values provided in `variableValues` case-insensitively. If set to
     * `true` **variableValue** and **variablevalue** are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

    /**
     * @var string|null Only include variable instances which belong to one of passed scope ids.
     */
    public ?string $variableScopeIdIn;

    /**
     * @var string|null Sort the results lexicographically by a given criterion.
     * Must be used in conjunction with the sortOrder parameter.
     */
    public ?string $sortBy;

    /**
     * @var string|null Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     */
    public ?string $sortOrder;

    /**
     * @var int|null Pagination of results. Specifies the index of the first result to return.
     */
    public ?int $firstResult;

    /**
     * @var int|null Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     */
    public ?int $maxResults;

    /**
     * @var bool|null Determines whether serializable variable values (typically variables that
     * store custom Java objects) should be deserialized on server side (default
     * `true`).
     *
     * If set to `true`, a serializable variable will be deserialized on server side
     * and transformed to JSON using
     * [Jackson's](https://github.com/FasterXML/jackson) POJO/bean property
     * introspection feature. Note that this requires the Java classes of the
     * variable value to be on the REST API's classpath.
     *
     * If set to `false`, a serializable variable will be returned in its serialized
     * format. For example, a variable that is serialized as XML will be returned as
     * a JSON string containing XML.
     **Note:** While `true` is the default value for reasons of backward
     * compatibility, we recommend setting this parameter to `false` when developing
     * web applications that are independent of the Java process applications
     * deployed to the engine.
     */
    public ?bool $deserializeValues;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variableName' => $this->variableName ?? null,
            'variableNameLike' => $this->variableNameLike ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'caseInstanceIdIn' => $this->caseInstanceIdIn ?? null,
            'caseExecutionIdIn' => $this->caseExecutionIdIn ?? null,
            'taskIdIn' => $this->taskIdIn ?? null,
            'batchIdIn' => $this->batchIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'variableValues' => $this->variableValues ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'variableScopeIdIn' => $this->variableScopeIdIn ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'deserializeValues' => $this->deserializeValues ?? null,
        ];
    }

}
