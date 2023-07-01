<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetAuthorizationCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the id of the authorization.
     */
    public ?string $id;

    /**
     * @var int|null Filter by authorization type. (0=global, 1=grant, 2=revoke).
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#authorization-type for more information about authorization types
     */
    public ?int $type;

    /**
     * @var string|null Filter by a comma-separated list of userIds.
     */
    public ?string $userIdIn;

    /**
     * @var string|null Filter by a comma-separated list of groupIds.
     */
    public ?string $groupIdIn;

    /**
     * @var int|null Filter by an integer representation of the resource type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#resources for a list of integer representations of resource types
     */
    public ?int $resourceType;

    /**
     * @var string|null Filter by resource id.
     */
    public ?string $resourceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'userIdIn' => $this->userIdIn ?? null,
            'groupIdIn' => $this->groupIdIn ?? null,
            'resourceType' => $this->resourceType ?? null,
            'resourceId' => $this->resourceId ?? null,
        ];
    }

}
