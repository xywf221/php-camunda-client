<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricDetailsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Only include historic details which belong to one of the passed comma-separated process instance ids.
     */
    public ?string $processInstanceIdIn;

    /**
     * @var string|null Filter by execution id.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by task id.
     */
    public ?string $taskId;

    /**
     * @var string|null Filter by activity instance id.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null Filter by case instance id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by case execution id.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null Filter by variable instance id.
     */
    public ?string $variableInstanceId;

    /**
     * @var string|null Only include historic details where the variable updates belong to one of the passed comma-separated
     * list of variable types. A list of all supported variable types can be found
     * [here](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#supported-variable-values).
     **Note:** All non-primitive variables are associated with the type `serializable`.
     */
    public ?string $variableTypeIn;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic details that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Filter by a user operation id.
     */
    public ?string $userOperationId;

    /**
     * @var bool|null Only include `HistoricFormFields`. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $formFields;

    /**
     * @var bool|null Only include `HistoricVariableUpdates`. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $variableUpdates;

    /**
     * @var bool|null Excludes all task-related `HistoricDetails`, so only items which have no task id set will be selected.
     * When this parameter is used together with `taskId`, this call is ignored and task details are not excluded.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $excludeTaskDetails;

    /**
     * @var bool|null Restrict to historic variable updates that contain only initial variable values.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $initial;

    /**
     * @var string|null Restrict to historic details that occured before the given date (including the date).
     * Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., 2013-01-23T14:42:45.000+0200.
     */
    public ?string $occurredBefore;

    /**
     * @var string|null Restrict to historic details that occured after the given date (including the date).
     * Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., 2013-01-23T14:42:45.000+0200.
     */
    public ?string $occurredAfter;

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
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'executionId' => $this->executionId ?? null,
            'taskId' => $this->taskId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'variableInstanceId' => $this->variableInstanceId ?? null,
            'variableTypeIn' => $this->variableTypeIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'userOperationId' => $this->userOperationId ?? null,
            'formFields' => $this->formFields ?? null,
            'variableUpdates' => $this->variableUpdates ?? null,
            'excludeTaskDetails' => $this->excludeTaskDetails ?? null,
            'initial' => $this->initial ?? null,
            'occurredBefore' => $this->occurredBefore ?? null,
            'occurredAfter' => $this->occurredAfter ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'deserializeValues' => $this->deserializeValues ?? null,
        ];
    }

}
