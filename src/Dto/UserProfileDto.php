<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class UserProfileDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the user.
     */
    public ?string $id;

    /**
     * @var string|null The first name of the user.
     */
    public ?string $firstName;

    /**
     * @var string|null The first name of the user.
     */
    public ?string $lastName;

    /**
     * @var string|null The email of the user.
     */
    public ?string $email;


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
            'email' => $this->email ?? null,
        ];
    }

}
