<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class PasswordPolicyRequestDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The candidate password to be check against the password policy.
     */
    public ?string $password;

    /**
     * @var UserProfileDto
     */
    public UserProfileDto $profile;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'password' => $this->password ?? null,
            'profile' => $this->profile ?? null,
        ];
    }

}
