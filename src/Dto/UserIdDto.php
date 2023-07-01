<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class UserIdDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the user that the current action refers to.
     */
    public ?string $userId;


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
