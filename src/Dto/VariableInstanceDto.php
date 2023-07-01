<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class VariableInstanceDto extends VariableValueDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var string|null The id of the process definition that this variable instance belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The id of the process instance that this variable instance belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the execution that this variable instance belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the case instance that this variable instance belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The id of the case execution that this variable instance belongs to.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null The id of the task that this variable instance belongs to.
     */
    public ?string $taskId;

    /**
     * @var string|null The id of the batch that this variable instance belongs to.<
     */
    public ?string $batchId;

    /**
     * @var string|null The id of the activity instance that this variable instance belongs to.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The id of the tenant that this variable instance belongs to.
     */
    public ?string $tenantId;

    /**
     * @var string|null An error message in case a Java Serialized Object could not be de-serialized.
     */
    public ?string $errorMessage;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'taskId' => $this->taskId ?? null,
            'batchId' => $this->batchId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'errorMessage' => $this->errorMessage ?? null,
        ];
    }

}
