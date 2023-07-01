<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class UserDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var UserProfileDto
     */
    public UserProfileDto $profile;

    /**
     * @var UserCredentialsDto
     */
    public UserCredentialsDto $credentials;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'profile' => $this->profile ?? null,
            'credentials' => $this->credentials ?? null,
        ];
    }

}
