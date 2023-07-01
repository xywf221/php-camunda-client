<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AuthorizationCheckResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Name of the permission which was checked.
     */
    public ?string $permissionName;

    /**
     * @var string|null The name of the resource for which the permission check was performed.
     */
    public ?string $resourceName;

    /**
     * @var string|null The id of the resource for which the permission check was performed.
     */
    public ?string $resourceId;

    /**
     * @var bool|null True / false for isAuthorized.
     */
    public ?bool $isAuthorized;


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
            'isAuthorized' => $this->isAuthorized ?? null,
        ];
    }

}
