<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class UserCredentialsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The users new password.
     */
    public ?string $password;

    /**
     * @var string|null The password of the authenticated user who changes the password of the user
     * (i.e., the user with passed id as path parameter).
     */
    public ?string $authenticatedUserPassword;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'password' => $this->password ?? null,
            'authenticatedUserPassword' => $this->authenticatedUserPassword ?? null,
        ];
    }

}
