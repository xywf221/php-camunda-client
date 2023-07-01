<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by job id.
     */
    public ?string $jobId;

    /**
     * @var array<string>|null Filter by a  list of job ids.
     */
    public ?array $jobIds;

    /**
     * @var string|null Only select jobs which exist for the given job definition.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null Only select jobs which exist for the given process instance.
     */
    public ?string $processInstanceId;

    /**
     * @var array<string>|null Only select jobs which exist for the given  list of process instance ids.
     */
    public ?array $processInstanceIds;

    /**
     * @var string|null Only select jobs which exist for the given execution.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by the id of the process definition the jobs run on.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the jobs run on.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only select jobs which exist for an activity with the given id.
     */
    public ?string $activityId;

    /**
     * @var bool|null Only select jobs which have retries left. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $withRetriesLeft;

    /**
     * @var bool|null Only select jobs which are executable, i.e., retries > 0 and due date is `null` or due
     * date is in the past. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $executable;

    /**
     * @var bool|null Only select jobs that are timers. Cannot be used together with `messages`. Value may only
     * be `true`, as `false` is the default behavior.
     */
    public ?bool $timers;

    /**
     * @var bool|null Only select jobs that are messages. Cannot be used together with `timers`. Value may only
     * be `true`, as `false` is the default behavior.
     */
    public ?bool $messages;

    /**
     * @var array<JobConditionQueryParameterDto>|null Only select jobs where the due date is lower or higher than the given date.
     */
    public ?array $dueDates;

    /**
     * @var array<JobConditionQueryParameterDto>|null Only select jobs created before or after the given date.
     */
    public ?array $createTimes;

    /**
     * @var bool|null Only select jobs that failed due to an exception. Value may only be `true`, as `false` is
     * the default behavior.
     */
    public ?bool $withException;

    /**
     * @var string|null Only select jobs that failed due to an exception with the given message.
     */
    public ?string $exceptionMessage;

    /**
     * @var string|null Only select jobs that failed due to an exception at an activity with the given id.
     */
    public ?string $failedActivityId;

    /**
     * @var bool|null Only select jobs which have no retries left. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $noRetriesLeft;

    /**
     * @var bool|null Only include active jobs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended jobs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $suspended;

    /**
     * @var int|null Only include jobs with a priority lower than or equal to the given value. Value must be a
     * valid `long` value.
     */
    public ?int $priorityLowerThanOrEquals;

    /**
     * @var int|null Only include jobs with a priority higher than or equal to the given value. Value must be a
     * valid `long` value.
     */
    public ?int $priorityHigherThanOrEquals;

    /**
     * @var array<string>|null Only include jobs which belong to one of the passed  tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include jobs which belong to no tenant. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include jobs which belong to no tenant. Can be used in combination with `tenantIdIn`.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeJobsWithoutTenantId;

    /**
     * @var array<object>|null An array of criteria to sort the result by. Each element of the array is
     * an object that specifies one ordering. The position in the array
     * identifies the rank of an ordering, i.e., whether it is primary, secondary,
     * etc. Does not have an effect for the `count` endpoint.
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'jobId' => $this->jobId ?? null,
            'jobIds' => $this->jobIds ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'executionId' => $this->executionId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'activityId' => $this->activityId ?? null,
            'withRetriesLeft' => $this->withRetriesLeft ?? null,
            'executable' => $this->executable ?? null,
            'timers' => $this->timers ?? null,
            'messages' => $this->messages ?? null,
            'dueDates' => $this->dueDates ?? null,
            'createTimes' => $this->createTimes ?? null,
            'withException' => $this->withException ?? null,
            'exceptionMessage' => $this->exceptionMessage ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'noRetriesLeft' => $this->noRetriesLeft ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'priorityLowerThanOrEquals' => $this->priorityLowerThanOrEquals ?? null,
            'priorityHigherThanOrEquals' => $this->priorityHigherThanOrEquals ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeJobsWithoutTenantId' => $this->includeJobsWithoutTenantId ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
