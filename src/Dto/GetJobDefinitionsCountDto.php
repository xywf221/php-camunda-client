<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetJobDefinitionsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by job definition id.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null Only include job definitions which belong to one of the passed and comma-separated activity ids.
     */
    public ?string $activityIdIn;

    /**
     * @var string|null Only include job definitions which exist for the given process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Only include job definitions which exist for the given process definition key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only include job definitions which exist for the given job type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/the-job-executor/#job-creation for more information about job types
     */
    public ?string $jobType;

    /**
     * @var string|null Only include job definitions which exist for the given job configuration. For example: for
     * timer jobs it is the timer configuration.
     */
    public ?string $jobConfiguration;

    /**
     * @var bool|null Only include active job definitions. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended job definitions. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $suspended;

    /**
     * @var bool|null Only include job definitions that have an overriding job priority defined. The only
     * effective value is `true`. If set to `false`, this filter is not applied.
     */
    public ?bool $withOverridingJobPriority;

    /**
     * @var string|null Only include job definitions which belong to one of the passed and comma-separated tenant
     * ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include job definitions which belong to no tenant. Value may only be `true`, as
     * `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include job definitions which belong to no tenant. Can be used in combination with
     * `tenantIdIn`. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeJobDefinitionsWithoutTenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'jobType' => $this->jobType ?? null,
            'jobConfiguration' => $this->jobConfiguration ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'withOverridingJobPriority' => $this->withOverridingJobPriority ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeJobDefinitionsWithoutTenantId' => $this->includeJobDefinitionsWithoutTenantId ?? null,
        ];
    }

}
