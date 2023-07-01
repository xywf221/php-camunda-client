<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetGroupInfoDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string The id of the user to get the groups for.
     */
    public string $userId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'userId' => $this->userId ?? null,
        ];
    }

}
