<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricJobLogDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the log entry.
     */
    public ?string $id;

    /**
     * @var string|null The time when the log entry has been written.
     */
    public ?string $timestamp;

    /**
     * @var string|null The time after which the log entry should be removed by the History Cleanup job.
     * Default format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`. For further info see the
     * [docs](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     */
    public ?string $removalTime;

    /**
     * @var string|null The id of the associated job.
     */
    public ?string $jobId;

    /**
     * @var string|null The date on which the associated job is supposed to be processed.
     */
    public ?string $jobDueDate;

    /**
     * @var int|null The number of retries the associated job has left.
     */
    public ?int $jobRetries;

    /**
     * @var int|null The execution priority the job had when the log entry was created.
     */
    public ?int $jobPriority;

    /**
     * @var string|null The message of the exception that occurred by executing the associated job.
     */
    public ?string $jobExceptionMessage;

    /**
     * @var string|null The id of the activity on which the last exception occurred by executing the
     * associated job.
     */
    public ?string $failedActivityId;

    /**
     * @var string|null The id of the job definition on which the associated job was created.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null The job definition type of the associated job.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/the-job-executor/#job-creation for more information about job definition types
     */
    public ?string $jobDefinitionType;

    /**
     * @var string|null The job definition configuration type of the associated job.
     */
    public ?string $jobDefinitionConfiguration;

    /**
     * @var string|null The id of the activity on which the associated job was created.
     */
    public ?string $activityId;

    /**
     * @var string|null The execution id on which the associated job was created.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the process instance on which the associated job was created.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the process definition which the associated job belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition which the associated job belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the deployment which the associated job belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * which the associated job belongs to.
     */
    public ?string $rootProcessInstanceId;

    /**
     * @var string|null The id of the tenant that this historic job log entry belongs to.
     */
    public ?string $tenantId;

    /**
     * @var string|null
     * The name of the host of the Process Engine where the
     * job of this historic job log entry was executed.
     */
    public ?string $hostname;

    /**
     * @var bool|null A flag indicating whether this log represents the creation of the associated job.
     */
    public ?bool $creationLog;

    /**
     * @var bool|null A flag indicating whether this log represents the failed execution of the
     * associated job.
     */
    public ?bool $failureLog;

    /**
     * @var bool|null A flag indicating whether this log represents the successful execution of the
     * associated job.
     */
    public ?bool $successLog;

    /**
     * @var bool|null A flag indicating whether this log represents the deletion of the associated job.
     */
    public ?bool $deletionLog;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'timestamp' => $this->timestamp ?? null,
            'removalTime' => $this->removalTime ?? null,
            'jobId' => $this->jobId ?? null,
            'jobDueDate' => $this->jobDueDate ?? null,
            'jobRetries' => $this->jobRetries ?? null,
            'jobPriority' => $this->jobPriority ?? null,
            'jobExceptionMessage' => $this->jobExceptionMessage ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'jobDefinitionType' => $this->jobDefinitionType ?? null,
            'jobDefinitionConfiguration' => $this->jobDefinitionConfiguration ?? null,
            'activityId' => $this->activityId ?? null,
            'executionId' => $this->executionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'hostname' => $this->hostname ?? null,
            'creationLog' => $this->creationLog ?? null,
            'failureLog' => $this->failureLog ?? null,
            'successLog' => $this->successLog ?? null,
            'deletionLog' => $this->deletionLog ?? null,
        ];
    }

}
