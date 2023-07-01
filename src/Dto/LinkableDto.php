<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class LinkableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<AtomLink>|null The links associated to this resource, with `method`, `href` and `rel`.
     */
    public ?array $links;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'links' => $this->links ?? null,
        ];
    }

}
