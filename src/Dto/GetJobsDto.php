<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetJobsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by job id.
     */
    public ?string $jobId;

    /**
     * @var string|null Filter by a comma-separated list of job ids.
     */
    public ?string $jobIds;

    /**
     * @var string|null Only select jobs which exist for the given job definition.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null Only select jobs which exist for the given process instance.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Only select jobs which exist for the given comma-separated list of process instance ids.
     */
    public ?string $processInstanceIds;

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
     * @var string|null Only select jobs where the due date is lower or higher than the given date.
     * Due date expressions are comma-separated and are structured as follows:
     *
     * A valid condition value has the form `operator_value`.
     * `operator` is the comparison operator to be used and `value` the date value
     * as string.
     *
     * Valid operator values are: `gt` - greater than; `lt` - lower than.
     * `value` may not contain underscore or comma characters.
     */
    public ?string $dueDates;

    /**
     * @var string|null Only select jobs created before or after the given date.
     *
     * Create time expressions are comma-separated and are structured as
     * follows:
     *
     * A valid condition value has the form `operator_value`.
     * `operator` is the comparison operator to be used and `value` the date value
     * as string.
     *
     * Valid operator values are: `gt` - greater than; `lt` - lower than.
     * `value` may not contain underscore or comma characters.
     */
    public ?string $createTimes;

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
     * @var string|null Only include jobs which belong to one of the passed comma-separated tenant ids.
     */
    public ?string $tenantIdIn;

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
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
