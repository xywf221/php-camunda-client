<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the job.
     */
    public ?string $id;

    /**
     * @var string|null The id of the associated job definition.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null The date on which this job is supposed to be processed.
     */
    public ?string $dueDate;

    /**
     * @var string|null The id of the process instance which execution created the job.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The specific execution id on which the job was created.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the process definition which this job belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition which this job belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var int|null The number of retries this job has left.
     */
    public ?int $retries;

    /**
     * @var string|null The message of the exception that occurred, the last time the job was executed. Is
     * null when no exception occurred.
     */
    public ?string $exceptionMessage;

    /**
     * @var string|null The id of the activity on which the last exception occurred, the last time the job
     * was executed. Is null when no exception occurred.
     */
    public ?string $failedActivityId;

    /**
     * @var bool|null A flag indicating whether the job is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var int|null The job's priority for execution.
     */
    public ?int $priority;

    /**
     * @var string|null The id of the tenant which this job belongs to.
     */
    public ?string $tenantId;

    /**
     * @var string|null The date on which this job has been created.
     */
    public ?string $createTime;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'dueDate' => $this->dueDate ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'retries' => $this->retries ?? null,
            'exceptionMessage' => $this->exceptionMessage ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'suspended' => $this->suspended ?? null,
            'priority' => $this->priority ?? null,
            'tenantId' => $this->tenantId ?? null,
            'createTime' => $this->createTime ?? null,
        ];
    }

}
