<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AuthorizationUpdateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null An array of Strings holding the permissions provided by this authorization.
     */
    public ?array $permissions;

    /**
     * @var string|null The id of the user this authorization has been created for. The value `*`
     * represents a global authorization ranging over all users.
     */
    public ?string $userId;

    /**
     * @var string|null The id of the group this authorization has been created for.
     */
    public ?string $groupId;

    /**
     * @var int|null An integer representing the resource type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#resources for a list of integer representations of resource types
     */
    public ?int $resourceType;

    /**
     * @var string|null The resource Id. The value `*` represents an authorization ranging over all
     * instances of a resource.
     */
    public ?string $resourceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'permissions' => $this->permissions ?? null,
            'userId' => $this->userId ?? null,
            'groupId' => $this->groupId ?? null,
            'resourceType' => $this->resourceType ?? null,
            'resourceId' => $this->resourceId ?? null,
        ];
    }

}
