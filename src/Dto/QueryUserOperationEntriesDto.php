<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class QueryUserOperationEntriesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by deployment id.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Filter by process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by process definition key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by execution id.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by case definition id.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null Filter by case instance id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by case execution id.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null Only include operations on this task.
     */
    public ?string $taskId;

    /**
     * @var string|null Only include operations on this external task.
     */
    public ?string $externalTaskId;

    /**
     * @var string|null Only include operations on this batch.
     */
    public ?string $batchId;

    /**
     * @var string|null Filter by job id.
     */
    public ?string $jobId;

    /**
     * @var string|null Filter by job definition id.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null Only include operations of this user.
     */
    public ?string $userId;

    /**
     * @var string|null Filter by the id of the operation. This allows fetching of multiple entries which are part
     * of a composite operation.
     */
    public ?string $operationId;

    /**
     * @var string|null Filter by the type of the operation like `Claim` or `Delegate`. See the
     * [Javadoc](https://docs.camunda.org/manual/develop/reference/javadoc/?org/camunda/bpm/engine/history/UserOperationLogEntry.html)
     * for a list of available operation types.
     */
    public ?string $operationType;

    /**
     * @var string|null Filter by the type of the entity that was affected by this operation, possible values are
     * `Task`, `Attachment` or `IdentityLink`.
     */
    public ?string $entityType;

    /**
     * @var string|null Filter by a comma-separated list of types of the entities that was affected by this operation,
     * possible values are `Task`, `Attachment` or `IdentityLink`.
     */
    public ?string $entityTypeIn;

    /**
     * @var string|null Filter by the category that this operation is associated with, possible values are
     * `TaskWorker`, `Admin` or `Operator`.
     */
    public ?string $category;

    /**
     * @var string|null Filter by a comma-separated list of categories that this operation is associated with, possible values are
     * `TaskWorker`, `Admin` or `Operator`.
     */
    public ?string $categoryIn;

    /**
     * @var string|null Only include operations that changed this property, e.g., `owner` or `assignee`.
     */
    public ?string $property;

    /**
     * @var string|null Restrict to entries that were created after the given timestamp. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the
     * timestamp must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., 2013-01-23T14:42:45.000+0200.
     */
    public ?string $afterTimestamp;

    /**
     * @var string|null Restrict to entries that were created before the given timestamp. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the
     * timestamp must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., 2013-01-23T14:42:45.000+0200.
     */
    public ?string $beforeTimestamp;

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
            'userId' => $this->userId ?? null,
            'operationId' => $this->operationId ?? null,
            'operationType' => $this->operationType ?? null,
            'entityType' => $this->entityType ?? null,
            'entityTypeIn' => $this->entityTypeIn ?? null,
            'category' => $this->category ?? null,
            'categoryIn' => $this->categoryIn ?? null,
            'property' => $this->property ?? null,
            'afterTimestamp' => $this->afterTimestamp ?? null,
            'beforeTimestamp' => $this->beforeTimestamp ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
