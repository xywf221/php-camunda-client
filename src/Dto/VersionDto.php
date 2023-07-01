<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class VersionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The version of the Rest API.
     */
    public ?string $version;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'version' => $this->version ?? null,
        ];
    }

}
