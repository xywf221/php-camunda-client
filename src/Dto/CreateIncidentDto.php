<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CreateIncidentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null A type of the new incident.
     */
    public ?string $incidentType;

    /**
     * @var string|null A configuration for the new incident.
     */
    public ?string $configuration;

    /**
     * @var string|null A message for the new incident.
     */
    public ?string $message;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'incidentType' => $this->incidentType ?? null,
            'configuration' => $this->configuration ?? null,
            'message' => $this->message ?? null,
        ];
    }

}
