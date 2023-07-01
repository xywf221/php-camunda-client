<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetIdentityLinksDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the type of links to include.
     */
    public ?string $type;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'type' => $this->type ?? null,
        ];
    }

}
