<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetCleanableHistoricDecisionInstanceReportCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by decision definition ids. Must be a comma-separated list of decision definition ids.
     */
    public ?string $decisionDefinitionIdIn;

    /**
     * @var string|null Filter by decision definition keys. Must be a comma-separated list of decision definition keys.
     */
    public ?string $decisionDefinitionKeyIn;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A decision definition must have one of the given tenant
     * ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include decision definitions which belong to no tenant. Value may only be `true`, as `false`
     * is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Only include decision instances which have more than zero finished instances. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $compact;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'decisionDefinitionIdIn' => $this->decisionDefinitionIdIn ?? null,
            'decisionDefinitionKeyIn' => $this->decisionDefinitionKeyIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'compact' => $this->compact ?? null,
        ];
    }

}
