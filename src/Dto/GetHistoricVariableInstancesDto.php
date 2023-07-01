<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricVariableInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by variable name.
     */
    public ?string $variableName;

    /**
     * @var string|null Restrict to variables with a name like the parameter.
     */
    public ?string $variableNameLike;

    /**
     * @var object|null Filter by variable value. Is treated as a `String` object on server side.
     */
    public ?object $variableValue;

    /**
     * @var bool|null Match the variable name provided in `variableName` and `variableNameLike` case-
     * insensitively. If set to `true` **variableName** and **variablename** are
     * treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match the variable value provided in `variableValue` case-insensitively. If set to `true`
     **variableValue** and **variablevalue** are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and comma-
     * separated variable types. A list of all supported variable types can be found
     * [here](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#supported-variable-values).
     **Note:** All non-primitive variables are associated with the type
     * 'serializable'.
     */
    public ?string $variableTypeIn;

    /**
     * @var bool|null Include variables that has already been deleted during the execution.
     */
    public ?bool $includeDeleted;

    /**
     * @var string|null Filter by the process instance the variable belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and comma-separated process instance ids.
     */
    public ?string $processInstanceIdIn;

    /**
     * @var string|null Filter by the process definition the variable belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by a key of the process definition the variable belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and and comma-separated execution ids.
     */
    public ?string $executionIdIn;

    /**
     * @var string|null Filter by the case instance the variable belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and and comma-separated case execution ids.
     */
    public ?string $caseExecutionIdIn;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and and comma-separated case activity ids.
     */
    public ?string $caseActivityIdIn;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and and comma-separated task ids.
     */
    public ?string $taskIdIn;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and and comma-separated activity instance ids.
     */
    public ?string $activityInstanceIdIn;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and comma-
     * separated tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic variable instances that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Only include historic variable instances which belong to one of the passed and comma-separated variable names.
     */
    public ?string $variableNameIn;

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
            'variableValue' => $this->variableValue ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'variableTypeIn' => $this->variableTypeIn ?? null,
            'includeDeleted' => $this->includeDeleted ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionIdIn' => $this->caseExecutionIdIn ?? null,
            'caseActivityIdIn' => $this->caseActivityIdIn ?? null,
            'taskIdIn' => $this->taskIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'variableNameIn' => $this->variableNameIn ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'deserializeValues' => $this->deserializeValues ?? null,
        ];
    }

}
