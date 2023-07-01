<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IncidentStatisticsResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The type of the incident the number of incidents is aggregated for.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
     */
    public ?string $incidentType;

    /**
     * @var int|null The total number of incidents for the corresponding incident type.
     */
    public ?int $incidentCount;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'incidentType' => $this->incidentType ?? null,
            'incidentCount' => $this->incidentCount ?? null,
        ];
    }

}
