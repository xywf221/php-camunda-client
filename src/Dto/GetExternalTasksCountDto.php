<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetExternalTasksCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by an external task's id.
     */
    public ?string $externalTaskId;

    /**
     * @var string|null Filter by the comma-separated list of external task ids.
     */
    public ?string $externalTaskIdIn;

    /**
     * @var string|null Filter by an external task topic.
     */
    public ?string $topicName;

    /**
     * @var string|null Filter by the id of the worker that the task was most recently locked by.
     */
    public ?string $workerId;

    /**
     * @var bool|null Only include external tasks that are currently locked (i.e., they have a lock time and it has not expired).
     * Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $locked;

    /**
     * @var bool|null Only include external tasks that are currently not locked (i.e., they have no lock or it has expired).
     * Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $notLocked;

    /**
     * @var bool|null Only include external tasks that have a positive (&gt; 0) number of retries (or `null`). Value may only be
     * `true`, as `false` matches any external task.
     */
    public ?bool $withRetriesLeft;

    /**
     * @var bool|null Only include external tasks that have 0 retries. Value may only be `true`, as `false` matches any
     * external task.
     */
    public ?bool $noRetriesLeft;

    /**
     * @var string|null Restrict to external tasks that have a lock that expires after a given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $lockExpirationAfter;

    /**
     * @var string|null Restrict to external tasks that have a lock that expires before a given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $lockExpirationBefore;

    /**
     * @var string|null Filter by the id of the activity that an external task is created for.
     */
    public ?string $activityId;

    /**
     * @var string|null Filter by the comma-separated list of ids of the activities that an external task is created for.
     */
    public ?string $activityIdIn;

    /**
     * @var string|null Filter by the id of the execution that an external task belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by the id of the process instance that an external task belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by a comma-separated list of process instance ids that an external task may belong to.
     */
    public ?string $processInstanceIdIn;

    /**
     * @var string|null Filter by the id of the process definition that an external task belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids.
     * An external task must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include active tasks. Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended tasks. Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $suspended;

    /**
     * @var int|null Only include jobs with a priority higher than or equal to the given value.
     * Value must be a valid `long` value.
     */
    public ?int $priorityHigherThanOrEquals;

    /**
     * @var int|null Only include jobs with a priority lower than or equal to the given value.
     * Value must be a valid `long` value.
     */
    public ?int $priorityLowerThanOrEquals;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'externalTaskId' => $this->externalTaskId ?? null,
            'externalTaskIdIn' => $this->externalTaskIdIn ?? null,
            'topicName' => $this->topicName ?? null,
            'workerId' => $this->workerId ?? null,
            'locked' => $this->locked ?? null,
            'notLocked' => $this->notLocked ?? null,
            'withRetriesLeft' => $this->withRetriesLeft ?? null,
            'noRetriesLeft' => $this->noRetriesLeft ?? null,
            'lockExpirationAfter' => $this->lockExpirationAfter ?? null,
            'lockExpirationBefore' => $this->lockExpirationBefore ?? null,
            'activityId' => $this->activityId ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'executionId' => $this->executionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'priorityHigherThanOrEquals' => $this->priorityHigherThanOrEquals ?? null,
            'priorityLowerThanOrEquals' => $this->priorityLowerThanOrEquals ?? null,
        ];
    }

}
