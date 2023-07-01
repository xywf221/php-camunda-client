<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricVariableInstanceDto extends VariableValueDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the variable instance.
     */
    public ?string $id;

    /**
     * @var string|null The name of the variable instance.
     */
    public ?string $name;

    /**
     * @var string|null The key of the process definition the variable instance belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process definition the variable instance belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The process instance id the variable instance belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The execution id the variable instance belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the activity instance in which the variable is valid.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The key of the case definition the variable instance belongs to.
     */
    public ?string $caseDefinitionKey;

    /**
     * @var string|null The id of the case definition the variable instance belongs to.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null The case instance id the variable instance belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The case execution id the variable instance belongs to.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null The id of the task the variable instance belongs to.
     */
    public ?string $taskId;

    /**
     * @var string|null The id of the tenant that this variable instance belongs to.
     */
    public ?string $tenantId;

    /**
     * @var string|null An error message in case a Java Serialized Object could not be de-serialized.
     */
    public ?string $errorMessage;

    /**
     * @var string|null The current state of the variable. Can be 'CREATED' or 'DELETED'.
     */
    public ?string $state;

    /**
     * @var string|null The time the variable was inserted. [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $createTime;

    /**
     * @var string|null The time after which the variable should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this variable.
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
            'name' => $this->name ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'taskId' => $this->taskId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'state' => $this->state ?? null,
            'createTime' => $this->createTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
