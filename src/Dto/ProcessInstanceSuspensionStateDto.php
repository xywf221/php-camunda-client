<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceSuspensionStateDto extends SuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The process definition id of the process instances to activate or suspend.
     **Note**: This parameter can be used only with combination of `suspended`.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The process definition key of the process instances to activate or suspend.
     **Note**: This parameter can be used only with combination of `suspended`, `processDefinitionTenantId`, and `processDefinitionWithoutTenantId`.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Only activate or suspend process instances of a process definition which belongs to a tenant with the given id.
     **Note**: This parameter can be used only with combination of `suspended`, `processDefinitionKey`, and `processDefinitionWithoutTenantId`.
     */
    public ?string $processDefinitionTenantId;

    /**
     * @var bool|null Only activate or suspend process instances of a process definition which belongs to no tenant.
     * Value may only be true, as false is the default behavior.
     **Note**: This parameter can be used only with combination of `suspended`, `processDefinitionKey`, and `processDefinitionTenantId`.
     */
    public ?bool $processDefinitionWithoutTenantId;

    /**
     * @var array<string>|null A list of process instance ids which defines a group of process instances
     * which will be activated or suspended by the operation.
     **Note**: This parameter can be used only with combination of `suspended`, `processInstanceQuery`, and `historicProcessInstanceQuery`.
     */
    public ?array $processInstanceIds;

    /**
     * @var ProcessInstanceQueryDto
     */
    public ProcessInstanceQueryDto $processInstanceQuery;

    /**
     * @var HistoricProcessInstanceQueryDto
     */
    public HistoricProcessInstanceQueryDto $historicProcessInstanceQuery;


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
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
        ];
    }

}
