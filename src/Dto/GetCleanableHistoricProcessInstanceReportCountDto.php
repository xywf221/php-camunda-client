<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetCleanableHistoricProcessInstanceReportCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by process definition ids. Must be a comma-separated list of process definition ids.
     */
    public ?string $processDefinitionIdIn;

    /**
     * @var string|null Filter by process definition keys. Must be a comma-separated list of process definition keys.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A process definition must have one of the given
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include process definitions which belong to no tenant. Value may only be `true`, as
     * `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Only include process instances which have more than zero finished instances. Value may
     * only be `true`, as `false` is the default behavior.
     */
    public ?bool $compact;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processDefinitionIdIn' => $this->processDefinitionIdIn ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'compact' => $this->compact ?? null,
        ];
    }

}
