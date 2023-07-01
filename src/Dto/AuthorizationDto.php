<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AuthorizationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the authorization.
     */
    public ?string $id;

    /**
     * @var int|null The type of the authorization (0=global, 1=grant, 2=revoke).
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service.md#authorization-type for more information about authorization types
     */
    public ?int $type;

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

    /**
     * @var string|null The removal time indicates the date a historic instance
     * authorization is cleaned up. A removal time can only be assigned to a historic
     * instance authorization. Can be `null` when not related to a historic instance
     * resource or when the removal time strategy is end and the root process instance
     * is not finished. Default format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance the historic
     * instance authorization is related to. Can be `null` if not related to a historic instance
     * resource.
     */
    public ?string $rootProcessInstanceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'permissions' => $this->permissions ?? null,
            'userId' => $this->userId ?? null,
            'groupId' => $this->groupId ?? null,
            'resourceType' => $this->resourceType ?? null,
            'resourceId' => $this->resourceId ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
