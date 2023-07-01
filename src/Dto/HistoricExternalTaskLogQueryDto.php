<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricExternalTaskLogQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by historic external task log id.
     */
    public ?string $logId;

    /**
     * @var string|null Filter by external task id.
     */
    public ?string $externalTaskId;

    /**
     * @var string|null Filter by an external task topic.
     */
    public ?string $topicName;

    /**
     * @var string|null Filter by the id of the worker that the task was most recently locked by.
     */
    public ?string $workerId;

    /**
     * @var string|null Filter by external task exception message.
     */
    public ?string $errorMessage;

    /**
     * @var array<string>|null Only include historic external task logs which belong to one of the passed activity ids.
     */
    public ?array $activityIdIn;

    /**
     * @var array<string>|null Only include historic external task logs which belong to one of the passed activity
     * instance ids.
     */
    public ?array $activityInstanceIdIn;

    /**
     * @var array<string>|null Only include historic external task logs which belong to one of the passed execution ids.
     */
    public ?array $executionIdIn;

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by process definition key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var array<string>|null Only include historic external task log entries which belong to one of the passed and
     * comma-separated tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include historic external task log entries that belong to no tenant. Value may only
     * be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var int|null Only include logs for which the associated external task had a priority lower than or
     * equal to the given value. Value must be a valid `long` value.
     */
    public ?int $priorityLowerThanOrEquals;

    /**
     * @var int|null Only include logs for which the associated external task had a priority higher than or
     * equal to the given value. Value must be a valid `long` value.
     */
    public ?int $priorityHigherThanOrEquals;

    /**
     * @var bool|null Only include creation logs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $creationLog;

    /**
     * @var bool|null Only include failure logs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $failureLog;

    /**
     * @var bool|null Only include success logs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $successLog;

    /**
     * @var bool|null Only include deletion logs. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $deletionLog;

    /**
     * @var array<object>|null An array of criteria to sort the result by. Each element of the array is
     * an object that specifies one ordering. The position in the array
     * identifies the rank of an ordering, i.e., whether it is primary, secondary,
     * etc. Sorting has no effect for `count` endpoints.
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'logId' => $this->logId ?? null,
            'externalTaskId' => $this->externalTaskId ?? null,
            'topicName' => $this->topicName ?? null,
            'workerId' => $this->workerId ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'priorityLowerThanOrEquals' => $this->priorityLowerThanOrEquals ?? null,
            'priorityHigherThanOrEquals' => $this->priorityHigherThanOrEquals ?? null,
            'creationLog' => $this->creationLog ?? null,
            'failureLog' => $this->failureLog ?? null,
            'successLog' => $this->successLog ?? null,
            'deletionLog' => $this->deletionLog ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
