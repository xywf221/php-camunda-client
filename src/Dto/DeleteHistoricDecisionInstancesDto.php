<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteHistoricDecisionInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of historic decision instance ids to delete.
     */
    public ?array $historicDecisionInstanceIds;

    /**
     * @var HistoricDecisionInstanceQueryDto
     */
    public HistoricDecisionInstanceQueryDto $historicDecisionInstanceQuery;

    /**
     * @var string|null A string with delete reason.
     */
    public ?string $deleteReason;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'historicDecisionInstanceIds' => $this->historicDecisionInstanceIds ?? null,
            'historicDecisionInstanceQuery' => $this->historicDecisionInstanceQuery ?? null,
            'deleteReason' => $this->deleteReason ?? null,
        ];
    }

}
