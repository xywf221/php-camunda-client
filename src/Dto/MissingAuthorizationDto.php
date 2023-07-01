<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MissingAuthorizationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The permission name that the user is missing.
     */
    public ?string $permissionName;

    /**
     * @var string|null The name of the resource that the user is missing permission for.
     */
    public ?string $resourceName;

    /**
     * @var string|null The id of the resource that the user is missing permission for.
     */
    public ?string $resourceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'permissionName' => $this->permissionName ?? null,
            'resourceName' => $this->resourceName ?? null,
            'resourceId' => $this->resourceId ?? null,
        ];
    }

}
