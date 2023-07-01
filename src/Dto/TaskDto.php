<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The task id.
     */
    public ?string $id;

    /**
     * @var string|null The task name.
     */
    public ?string $name;

    /**
     * @var string|null The assignee's id.
     */
    public ?string $assignee;

    /**
     * @var string|null The owner's id.
     */
    public ?string $owner;

    /**
     * @var string|null The date the task was created on.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $created;

    /**
     * @var string|null The date the task was last updated. Every action that fires a [task update event](https://docs.camunda.org/manual/develop/user-guide/process-engine/delegation-code/#task-listener-event-lifecycle) will update this property.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $lastUpdated;

    /**
     * @var string|null The task's due date.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $due;

    /**
     * @var string|null The follow-up date for the task.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $followUp;

    /**
     * @var string|null The task's delegation state. Possible values are `PENDING` and `RESOLVED`.
     */
    public ?string $delegationState;

    /**
     * @var string|null The task's description.
     */
    public ?string $description;

    /**
     * @var string|null The id of the execution the task belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null The id the parent task, if this task is a subtask.
     */
    public ?string $parentTaskId;

    /**
     * @var int|null The task's priority.
     */
    public ?int $priority;

    /**
     * @var string|null The id of the process definition the task belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The id of the process instance the task belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the case execution the task belongs to.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null The id of the case definition the task belongs to.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null The id of the case instance the task belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The task's key.
     */
    public ?string $taskDefinitionKey;

    /**
     * @var bool|null Whether the task belongs to a process instance that is suspended.
     */
    public ?bool $suspended;

    /**
     * @var string|null If not `null`, the form key for the task.
     */
    public ?string $formKey;

    /**
     * @var object|null A reference to a specific version of a Camunda Form.
     */
    public ?object $camundaFormRef;

    /**
     * @var string|null If not `null`, the tenant id of the task.
     */
    public ?string $tenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'assignee' => $this->assignee ?? null,
            'owner' => $this->owner ?? null,
            'created' => $this->created ?? null,
            'lastUpdated' => $this->lastUpdated ?? null,
            'due' => $this->due ?? null,
            'followUp' => $this->followUp ?? null,
            'delegationState' => $this->delegationState ?? null,
            'description' => $this->description ?? null,
            'executionId' => $this->executionId ?? null,
            'parentTaskId' => $this->parentTaskId ?? null,
            'priority' => $this->priority ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'taskDefinitionKey' => $this->taskDefinitionKey ?? null,
            'suspended' => $this->suspended ?? null,
            'formKey' => $this->formKey ?? null,
            'camundaFormRef' => $this->camundaFormRef ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
