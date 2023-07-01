<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IdentityServiceUserDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the user.
     */
    public ?string $id;

    /**
     * @var string|null The firstname of the user.
     */
    public ?string $firstName;

    /**
     * @var string|null The lastname of the user.
     */
    public ?string $lastName;

    /**
     * @var string|null The displayName is generated from the id or firstName and lastName if available.
     */
    public ?string $displayName;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'firstName' => $this->firstName ?? null,
            'lastName' => $this->lastName ?? null,
            'displayName' => $this->displayName ?? null,
        ];
    }

}
