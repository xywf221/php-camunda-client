<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IdentityServiceGroupDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the group.
     */
    public ?string $id;

    /**
     * @var string|null The name of the group.
     */
    public ?string $name;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
        ];
    }

}
