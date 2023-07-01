<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricTaskInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The task id.
     */
    public ?string $id;

    /**
     * @var string|null The key of the process definition the task belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process definition the task belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The id of the process instance the task belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the execution the task belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null The key of the case definition the task belongs to.
     */
    public ?string $caseDefinitionKey;

    /**
     * @var string|null The id of the case definition the task belongs to.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null The id of the case instance the task belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The id of the case execution the task belongs to.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null The id of the activity that this object is an instance of.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The task name.
     */
    public ?string $name;

    /**
     * @var string|null The task's description.
     */
    public ?string $description;

    /**
     * @var string|null The task's delete reason.
     */
    public ?string $deleteReason;

    /**
     * @var string|null The owner's id.
     */
    public ?string $owner;

    /**
     * @var string|null The assignee's id.
     */
    public ?string $assignee;

    /**
     * @var string|null The time the task was started. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $startTime;

    /**
     * @var string|null The time the task ended. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $endTime;

    /**
     * @var int|null The time the task took to finish (in milliseconds).
     */
    public ?int $duration;

    /**
     * @var string|null The task's key.
     */
    public ?string $taskDefinitionKey;

    /**
     * @var int|null The task's priority.
     */
    public ?int $priority;

    /**
     * @var string|null The task's due date. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $due;

    /**
     * @var string|null The id of the parent task, if this task is a subtask.
     */
    public ?string $parentTaskId;

    /**
     * @var string|null The follow-up date for the task. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $followUp;

    /**
     * @var string|null The tenant id of the task instance.
     */
    public ?string $tenantId;

    /**
     * @var string|null The time after which the task should be removed by the History Cleanup job. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this task.
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
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'name' => $this->name ?? null,
            'description' => $this->description ?? null,
            'deleteReason' => $this->deleteReason ?? null,
            'owner' => $this->owner ?? null,
            'assignee' => $this->assignee ?? null,
            'startTime' => $this->startTime ?? null,
            'endTime' => $this->endTime ?? null,
            'duration' => $this->duration ?? null,
            'taskDefinitionKey' => $this->taskDefinitionKey ?? null,
            'priority' => $this->priority ?? null,
            'due' => $this->due ?? null,
            'parentTaskId' => $this->parentTaskId ?? null,
            'followUp' => $this->followUp ?? null,
            'tenantId' => $this->tenantId ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
