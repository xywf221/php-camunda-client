<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobSuspensionStateDto extends SuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The job definition id of the jobs to activate or suspend.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null The process definition id of the jobs to activate or suspend.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The process instance id of the jobs to activate or suspend.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The process definition key of the jobs to activate or suspend.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only activate or suspend jobs of a process definition which belongs to a tenant
     * with the given id. Works only when selecting with `processDefinitionKey`.
     */
    public ?string $processDefinitionTenantId;

    /**
     * @var bool|null Only activate or suspend jobs of a process definition which belongs to no tenant.
     * Value may only be `true`, as `false` is the default behavior. Works only when selecting with `processDefinitionKey`.
     */
    public ?bool $processDefinitionWithoutTenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionTenantId' => $this->processDefinitionTenantId ?? null,
            'processDefinitionWithoutTenantId' => $this->processDefinitionWithoutTenantId ?? null,
        ];
    }

}
