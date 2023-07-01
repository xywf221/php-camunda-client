<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IdentityServiceGroupInfoDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<IdentityServiceGroupDto>|null An array of group objects.
     */
    public ?array $groups;

    /**
     * @var array<IdentityServiceUserDto>|null An array that contains all users that are member in one of the groups.
     */
    public ?array $groupUsers;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'groups' => $this->groups ?? null,
            'groupUsers' => $this->groupUsers ?? null,
        ];
    }

}
