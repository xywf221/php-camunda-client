<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetRemovalTimeToHistoricDecisionInstancesDto extends AbstractSetRemovalTimeDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Sets the removal time to all historic decision instances in the hierarchy.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $hierarchical;

    /**
     * @var HistoricDecisionInstanceQueryDto
     */
    public HistoricDecisionInstanceQueryDto $historicDecisionInstanceQuery;

    /**
     * @var array<string>|null The ids of the historic decision instances to set the removal time for.
     */
    public ?array $historicDecisionInstanceIds;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'hierarchical' => $this->hierarchical ?? null,
            'historicDecisionInstanceQuery' => $this->historicDecisionInstanceQuery ?? null,
            'historicDecisionInstanceIds' => $this->historicDecisionInstanceIds ?? null,
        ];
    }

}
