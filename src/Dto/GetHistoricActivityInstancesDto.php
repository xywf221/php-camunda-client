<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricActivityInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

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
     * @var string|null Filter by activity instance id.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the id of the execution that executed the activity instance.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by the activity id (according to BPMN 2.0 XML).
     */
    public ?string $activityId;

    /**
     * @var string|null Filter by the activity name (according to BPMN 2.0 XML).
     */
    public ?string $activityName;

    /**
     * @var string|null Filter by activity type.
     */
    public ?string $activityType;

    /**
     * @var string|null Only include activity instances that are user tasks and assigned to a given user.
     */
    public ?string $taskAssignee;

    /**
     * @var bool|null Only include finished activity instances.
     * Value may only be `true`, as `false` behaves the same as when the property is not set.
     */
    public ?bool $finished;

    /**
     * @var bool|null Only include unfinished activity instances.
     * Value may only be `true`, as `false` behaves the same as when the property is not set.
     */
    public ?bool $unfinished;

    /**
     * @var bool|null Only include canceled activity instances.
     * Value may only be `true`, as `false` behaves the same as when the property is not set.
     */
    public ?bool $canceled;

    /**
     * @var bool|null Only include activity instances which completed a scope.
     * Value may only be `true`, as `false` behaves the same as when the property is not set.
     */
    public ?bool $completeScope;

    /**
     * @var string|null Restrict to instances that were started before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Restrict to instances that were started after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;

    /**
     * @var string|null Restrict to instances that were finished before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedBefore;

    /**
     * @var string|null Restrict to instances that were finished after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedAfter;

    /**
     * @var string|null Filter by a comma-separated list of ids. An activity instance must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic activity instances that belong to no tenant. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'executionId' => $this->executionId ?? null,
            'activityId' => $this->activityId ?? null,
            'activityName' => $this->activityName ?? null,
            'activityType' => $this->activityType ?? null,
            'taskAssignee' => $this->taskAssignee ?? null,
            'finished' => $this->finished ?? null,
            'unfinished' => $this->unfinished ?? null,
            'canceled' => $this->canceled ?? null,
            'completeScope' => $this->completeScope ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
            'finishedBefore' => $this->finishedBefore ?? null,
            'finishedAfter' => $this->finishedAfter ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
        ];
    }

}
