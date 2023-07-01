<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class BasicUserCredentialsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The username of a user.
     */
    public ?string $username;

    /**
     * @var string|null A password of a user.
     */
    public ?string $password;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'username' => $this->username ?? null,
            'password' => $this->password ?? null,
        ];
    }

}
