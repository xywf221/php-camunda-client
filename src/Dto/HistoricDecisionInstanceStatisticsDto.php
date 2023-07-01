<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricDecisionInstanceStatisticsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null A key of decision definition.
     */
    public ?string $decisionDefinitionKey;

    /**
     * @var int|null A number of evaluation for decision definition.
     */
    public ?int $evaluations;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'decisionDefinitionKey' => $this->decisionDefinitionKey ?? null,
            'evaluations' => $this->evaluations ?? null,
        ];
    }

}
