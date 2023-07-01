<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryProductDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the product (i.e., Camunda BPM Runtime).
     */
    public ?string $name;

    /**
     * @var string|null The version of the process engine (i.e., 7.X.Y).
     */
    public ?string $version;

    /**
     * @var string|null The edition of the product (i.e., either community or enterprise).
     */
    public ?string $edition;

    /**
     * @var object|null Internal data and metrics collected by the product.
     */
    public ?object $internals;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'name' => $this->name ?? null,
            'version' => $this->version ?? null,
            'edition' => $this->edition ?? null,
            'internals' => $this->internals ?? null,
        ];
    }

}
