<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the activity that this external task belongs to.
     */
    public ?string $activityId;

    /**
     * @var string|null The id of the activity instance that the external task belongs to.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The full error message submitted with the latest reported failure executing this task; `null` if no
     * failure was reported previously or if no error message was submitted
     */
    public ?string $errorMessage;

    /**
     * @var string|null The id of the execution that the external task belongs to.
     */
    public ?string $executionId;

    /**
     * @var string|null The id of the external task.
     */
    public ?string $id;

    /**
     * @var string|null The date that the task's most recent lock expires or has expired.
     */
    public ?string $lockExpirationTime;

    /**
     * @var string|null The id of the process definition the external task is defined in.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition the external task is defined in.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The version tag of the process definition the external task is defined in.
     */
    public ?string $processDefinitionVersionTag;

    /**
     * @var string|null The id of the process instance the external task belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the tenant the external task belongs to.
     */
    public ?string $tenantId;

    /**
     * @var int|null The number of retries the task currently has left.
     */
    public ?int $retries;

    /**
     * @var bool|null A flag indicating whether the external task is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var string|null The id of the worker that posesses or posessed the most recent lock.
     */
    public ?string $workerId;

    /**
     * @var string|null The topic name of the external task.
     */
    public ?string $topicName;

    /**
     * @var int|null The priority of the external task.
     */
    public ?int $priority;

    /**
     * @var string|null The business key of the process instance the external task belongs to.
     */
    public ?string $businessKey;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'activityId' => $this->activityId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'executionId' => $this->executionId ?? null,
            'id' => $this->id ?? null,
            'lockExpirationTime' => $this->lockExpirationTime ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionVersionTag' => $this->processDefinitionVersionTag ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'retries' => $this->retries ?? null,
            'suspended' => $this->suspended ?? null,
            'workerId' => $this->workerId ?? null,
            'topicName' => $this->topicName ?? null,
            'priority' => $this->priority ?? null,
            'businessKey' => $this->businessKey ?? null,
        ];
    }

}
