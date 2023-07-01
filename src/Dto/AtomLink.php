<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AtomLink implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The relation of the link to the object that belongs to.
     */
    public ?string $rel;

    /**
     * @var string|null The url of the link.
     */
    public ?string $href;

    /**
     * @var string|null The http method.
     */
    public ?string $method;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'rel' => $this->rel ?? null,
            'href' => $this->href ?? null,
            'method' => $this->method ?? null,
        ];
    }

}
