<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryConfigurationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Specifies if the telemetry data should be sent or not.
     */
    public ?bool $enableTelemetry;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'enableTelemetry' => $this->enableTelemetry ?? null,
        ];
    }

}
