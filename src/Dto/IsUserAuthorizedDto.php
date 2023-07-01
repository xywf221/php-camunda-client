<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IsUserAuthorizedDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string String value representing the permission name to check for.
     */
    public string $permissionName;

    /**
     * @var string String value for the name of the resource to check permissions for.
     */
    public string $resourceName;

    /**
     * @var int An integer representing the resource type to check permissions for.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#resources for a list of integer representations of resource types
     */
    public int $resourceType;

    /**
     * @var string|null The id of the resource to check permissions for. If left blank,
     * a check for global permissions on the resource is performed.
     */
    public ?string $resourceId;

    /**
     * @var string|null The id of the user to check permissions for. The currently authenticated
     * user must have a READ permission for the Authorization resource. If `userId` is
     * blank, a check for the currently authenticated user is performed.
     */
    public ?string $userId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'permissionName' => $this->permissionName ?? null,
            'resourceName' => $this->resourceName ?? null,
            'resourceType' => $this->resourceType ?? null,
            'resourceId' => $this->resourceId ?? null,
            'userId' => $this->userId ?? null,
        ];
    }

}
