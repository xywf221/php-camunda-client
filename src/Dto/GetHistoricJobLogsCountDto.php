<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricJobLogsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by historic job log id.
     */
    public ?string $logId;

    /**
     * @var string|null Filter by job id.
     */
    public ?string $jobId;

    /**
     * @var string|null Filter by job exception message.
     */
    public ?string $jobExceptionMessage;

    /**
     * @var string|null Filter by job definition id.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null Filter by job definition type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/the-job-executor/#job-creation for more information about job definition types
     */
    public ?string $jobDefinitionType;

    /**
     * @var string|null Filter by job definition configuration.
     */
    public ?string $jobDefinitionConfiguration;

    /**
     * @var string|null Only include historic job logs which belong to one of the passed activity ids.
     */
    public ?string $activityIdIn;

    /**
     * @var string|null Only include historic job logs which belong to failures of one of the passed activity ids.
     */
    public ?string $failedActivityIdIn;

    /**
     * @var string|null Only include historic job logs which belong to one of the passed execution ids.
     */
    public ?string $executionIdIn;

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
     * @var string|null Filter by deployment id.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Only include historic job log entries which belong to one of the passed and comma-
     * separated tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic job log entries that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Filter by hostname.
     */
    public ?string $hostname;

    /**
     * @var int|null Only include logs for which the associated job had a priority lower than or equal to the
     * given value. Value must be a valid `long` value.
     */
    public ?int $jobPriorityLowerThanOrEquals;

    /**
     * @var int|null Only include logs for which the associated job had a priority higher than or equal to the
     * given value. Value must be a valid `long` value.
     */
    public ?int $jobPriorityHigherThanOrEquals;

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


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'logId' => $this->logId ?? null,
            'jobId' => $this->jobId ?? null,
            'jobExceptionMessage' => $this->jobExceptionMessage ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'jobDefinitionType' => $this->jobDefinitionType ?? null,
            'jobDefinitionConfiguration' => $this->jobDefinitionConfiguration ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'failedActivityIdIn' => $this->failedActivityIdIn ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'hostname' => $this->hostname ?? null,
            'jobPriorityLowerThanOrEquals' => $this->jobPriorityLowerThanOrEquals ?? null,
            'jobPriorityHigherThanOrEquals' => $this->jobPriorityHigherThanOrEquals ?? null,
            'creationLog' => $this->creationLog ?? null,
            'failureLog' => $this->failureLog ?? null,
            'successLog' => $this->successLog ?? null,
            'deletionLog' => $this->deletionLog ?? null,
        ];
    }

}
