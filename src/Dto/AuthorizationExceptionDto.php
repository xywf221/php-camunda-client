<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AuthorizationExceptionDto extends ExceptionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the user that does not have expected permissions
     */
    public ?string $userId;

    /**
     * @var array<MissingAuthorizationDto>|null
     */
    public ?array $missingAuthorizations;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'userId' => $this->userId ?? null,
            'missingAuthorizations' => $this->missingAuthorizations ?? null,
        ];
    }

}
