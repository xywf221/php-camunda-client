<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IdentityLinkDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the user participating in this link. Either `userId` or `groupId` is set.
     */
    public ?string $userId;

    /**
     * @var string|null The id of the group participating in this link. Either `groupId` or `userId` is set.
     */
    public ?string $groupId;

    /**
     * @var string|null The type of the identity link. The value of the this property can be user-defined. The Process Engine
     * provides three pre-defined Identity Link `type`s:
     * `candidate`
     * `assignee` - reserved for the task assignee
     * `owner` - reserved for the task owner
     **Note**: When adding or removing an Identity Link, the `type` property must be defined.
     */
    public ?string $type;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'userId' => $this->userId ?? null,
            'groupId' => $this->groupId ?? null,
            'type' => $this->type ?? null,
        ];
    }

}
