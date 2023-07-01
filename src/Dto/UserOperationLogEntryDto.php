<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class UserOperationLogEntryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The unique identifier of this log entry.
     */
    public ?string $id;

    /**
     * @var string|null The user who performed this operation.
     */
    public ?string $userId;

    /**
     * @var string|null Timestamp of this operation.
     */
    public ?string $timestamp;

    /**
     * @var string|null The unique identifier of this operation. A composite operation that changes
     * multiple properties has a common `operationId`.
     */
    public ?string $operationId;

    /**
     * @var string|null The type of this operation, e.g., `Assign`, `Claim` and so on.
     */
    public ?string $operationType;

    /**
     * @var string|null The type of the entity on which this operation was executed, e.g., `Task` or
     * `Attachment`.
     */
    public ?string $entityType;

    /**
     * @var string|null The name of the category this operation was associated with, e.g., `TaskWorker` or
     * `Admin`.
     */
    public ?string $category;

    /**
     * @var string|null An arbitrary annotation set by a user for auditing reasons.
     */
    public ?string $annotation;

    /**
     * @var string|null The property changed by this operation.
     */
    public ?string $property;

    /**
     * @var string|null The original value of the changed property.
     */
    public ?string $orgValue;

    /**
     * @var string|null The new value of the changed property.
     */
    public ?string $newValue;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this
     * deployment.
     */
    public ?string $deploymentId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this process
     * definition.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to process
     * definitions with this key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this process
     * instance.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this
     * execution.
     */
    public ?string $executionId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this case
     * definition.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this case
     * instance.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this case
     * execution.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this task.
     */
    public ?string $taskId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this external task.
     */
    public ?string $externalTaskId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this batch.
     */
    public ?string $batchId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this job.
     */
    public ?string $jobId;

    /**
     * @var string|null If not `null`, the operation is restricted to entities in relation to this job
     * definition.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null The time after which the entry should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this entry.
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
            'userId' => $this->userId ?? null,
            'timestamp' => $this->timestamp ?? null,
            'operationId' => $this->operationId ?? null,
            'operationType' => $this->operationType ?? null,
            'entityType' => $this->entityType ?? null,
            'category' => $this->category ?? null,
            'annotation' => $this->annotation ?? null,
            'property' => $this->property ?? null,
            'orgValue' => $this->orgValue ?? null,
            'newValue' => $this->newValue ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'taskId' => $this->taskId ?? null,
            'externalTaskId' => $this->externalTaskId ?? null,
            'batchId' => $this->batchId ?? null,
            'jobId' => $this->jobId ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
