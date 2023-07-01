<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ActivityInstanceIncidentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the incident.
     */
    public ?string $id;

    /**
     * @var string|null The activity id in which the incident happened.
     */
    public ?string $activityId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'activityId' => $this->activityId ?? null,
        ];
    }

}
