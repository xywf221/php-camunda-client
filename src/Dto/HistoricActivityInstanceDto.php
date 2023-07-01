<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricActivityInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the activity instance.
     */
    public ?string $id;

    /**
     * @var string|null The id of the parent activity instance, for example a sub process instance.
     */
    public ?string $parentActivityInstanceId;

    /**
     * @var string|null The id of the activity that this object is an instance of.
     */
    public ?string $activityId;

    /**
     * @var string|null The name of the activity that this object is an instance of.
     */
    public ?string $activityName;

    /**
     * @var string|null The type of the activity that this object is an instance of.
     */
    public ?string $activityType;

    /**
     * @var string|null The key of the process definition that this activity instance belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process definition that this activity instance belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The id of the process instance that this activity instance belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the execution that executed this activity instance.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the task that is associated to this activity instance. Is only set if the activity is a user task.
     */
    public ?string $taskId;

    /**
     * @var string|null The assignee of the task that is associated to this activity instance. Is only set if the activity is a user task.
     */
    public ?string $assignee;

    /**
     * @var string|null The id of the called process instance. Is only set if the activity is a call activity and the called instance a process instance.
     */
    public ?string $calledProcessInstanceId;

    /**
     * @var string|null The id of the called case instance. Is only set if the activity is a call activity and the called instance a case instance.
     */
    public ?string $calledCaseInstanceId;

    /**
     * @var string|null The time the instance was started. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startTime;

    /**
     * @var string|null The time the instance ended. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $endTime;

    /**
     * @var int|null The time the instance took to finish (in milliseconds).
     */
    public ?int $durationInMillis;

    /**
     * @var bool|null If `true`, this activity instance is canceled.
     */
    public ?bool $canceled;

    /**
     * @var bool|null If `true`, this activity instance did complete a BPMN 2.0 scope.
     */
    public ?bool $completeScope;

    /**
     * @var string|null The tenant id of the activity instance.
     */
    public ?string $tenantId;

    /**
     * @var string|null The time after which the activity instance should be removed by the History Cleanup job. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process containing this activity instance.
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
            'parentActivityInstanceId' => $this->parentActivityInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'activityName' => $this->activityName ?? null,
            'activityType' => $this->activityType ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'taskId' => $this->taskId ?? null,
            'assignee' => $this->assignee ?? null,
            'calledProcessInstanceId' => $this->calledProcessInstanceId ?? null,
            'calledCaseInstanceId' => $this->calledCaseInstanceId ?? null,
            'startTime' => $this->startTime ?? null,
            'endTime' => $this->endTime ?? null,
            'durationInMillis' => $this->durationInMillis ?? null,
            'canceled' => $this->canceled ?? null,
            'completeScope' => $this->completeScope ?? null,
            'tenantId' => $this->tenantId ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
