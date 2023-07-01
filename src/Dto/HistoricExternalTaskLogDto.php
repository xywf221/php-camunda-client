<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricExternalTaskLogDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the log entry.
     */
    public ?string $id;

    /**
     * @var string|null The id of the external task.
     */
    public ?string $externalTaskId;

    /**
     * @var string|null The time when the log entry has been written.
     */
    public ?string $timestamp;

    /**
     * @var string|null The topic name of the associated external task.
     */
    public ?string $topicName;

    /**
     * @var string|null The id of the worker that posessed the most recent lock.
     */
    public ?string $workerId;

    /**
     * @var int|null The number of retries the associated external task has left.
     */
    public ?int $retries;

    /**
     * @var int|null The execution priority the external task had when the log entry was created.
     */
    public ?int $priority;

    /**
     * @var string|null The message of the error that occurred by executing the associated external task.
     */
    public ?string $errorMessage;

    /**
     * @var string|null The id of the activity on which the associated external task was created.
     */
    public ?string $activityId;

    /**
     * @var string|null The id of the activity instance on which the associated external task was created.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The execution id on which the associated external task was created.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the process instance on which the associated external task was created.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the process definition which the associated external task belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition which the associated external task belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the tenant that this historic external task log entry belongs to.
     */
    public ?string $tenantId;

    /**
     * @var bool|null A flag indicating whether this log represents the creation of the associated
     * external task.
     */
    public ?bool $creationLog;

    /**
     * @var bool|null A flag indicating whether this log represents the failed execution of the
     * associated external task.
     */
    public ?bool $failureLog;

    /**
     * @var bool|null A flag indicating whether this log represents the successful execution of the
     * associated external task.
     */
    public ?bool $successLog;

    /**
     * @var bool|null A flag indicating whether this log represents the deletion of the associated
     * external task.
     */
    public ?bool $deletionLog;

    /**
     * @var string|null The time after which this log should be removed by the History Cleanup job. Default
     * format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.  For further information, please see the [documentation](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this log.
     */
    public ?string $rootProcessInstanceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'externalTaskId' => $this->externalTaskId ?? null,
            'timestamp' => $this->timestamp ?? null,
            'topicName' => $this->topicName ?? null,
            'workerId' => $this->workerId ?? null,
            'retries' => $this->retries ?? null,
            'priority' => $this->priority ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'activityId' => $this->activityId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'tenantId' => $this->tenantId ?? null,
            'creationLog' => $this->creationLog ?? null,
            'failureLog' => $this->failureLog ?? null,
            'successLog' => $this->successLog ?? null,
            'deletionLog' => $this->deletionLog ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
