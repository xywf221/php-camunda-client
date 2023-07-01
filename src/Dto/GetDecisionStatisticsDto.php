<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetDecisionStatisticsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Restrict query results to be based only on specific evaluation
     * instance of a given decision requirements definition.
     */
    public ?string $decisionInstanceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'decisionInstanceId' => $this->decisionInstanceId ?? null,
        ];
    }

}
