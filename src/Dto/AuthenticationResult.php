<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AuthenticationResult implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An id of authenticated user.
     */
    public ?string $authenticatedUser;

    /**
     * @var bool|null A flag indicating if user is authenticated.
     */
    public ?bool $isAuthenticated;

    /**
     * @var array<string>|null Will be null.
     */
    public ?array $tenants;

    /**
     * @var array<string>|null Will be null.
     */
    public ?array $groups;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'authenticatedUser' => $this->authenticatedUser ?? null,
            'isAuthenticated' => $this->isAuthenticated ?? null,
            'tenants' => $this->tenants ?? null,
            'groups' => $this->groups ?? null,
        ];
    }

}
