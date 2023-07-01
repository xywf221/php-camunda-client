<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDefinitionsSuspensionStateDto extends JobDefinitionSuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The process definition id of the job definitions to activate or suspend.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The process definition key of the job definitions to activate or suspend.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only activate or suspend job definitions of a process definition which belongs to a
     * tenant with the given id.
     *
     * Note that this parameter will only be considered
     * in combination with `processDefinitionKey`.
     */
    public ?string $processDefinitionTenantId;

    /**
     * @var bool|null Only activate or suspend job definitions of a process definition which belongs to
     * no tenant. Value may only be `true`, as `false` is the default
     * behavior.
     *
     * Note that this parameter will only be considered
     * in combination with `processDefinitionKey`.
     */
    public ?bool $processDefinitionWithoutTenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionTenantId' => $this->processDefinitionTenantId ?? null,
            'processDefinitionWithoutTenantId' => $this->processDefinitionWithoutTenantId ?? null,
        ];
    }

}
