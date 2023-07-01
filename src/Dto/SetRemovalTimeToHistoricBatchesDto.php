<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetRemovalTimeToHistoricBatchesDto extends AbstractSetRemovalTimeDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null Query for the historic batches to set the removal time for.
     */
    public ?object $historicBatchQuery;

    /**
     * @var array<string>|null The ids of the historic batches to set the removal time for.
     */
    public ?array $historicBatchIds;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'historicBatchQuery' => $this->historicBatchQuery ?? null,
            'historicBatchIds' => $this->historicBatchIds ?? null,
        ];
    }

}
