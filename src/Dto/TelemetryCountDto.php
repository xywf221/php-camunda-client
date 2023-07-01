<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null An integer value representing the count for this metric.
     */
    public ?int $count;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'count' => $this->count ?? null,
        ];
    }

}
