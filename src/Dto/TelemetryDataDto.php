<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryDataDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An id which is unique for each installation of Camunda. It is stored once per database so all
     * engines connected to the same database will have the same installation ID.
     * The ID is used to identify a single installation of Camunda Platform.
     */
    public ?string $installation;

    /**
     * @var object|null Information about the product collection telemetry data.
     */
    public ?object $product;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'installation' => $this->installation ?? null,
            'product' => $this->product ?? null,
        ];
    }

}
