<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SchemaLogEntryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the schema log entry.
     */
    public ?string $id;

    /**
     * @var string|null The date and time of the schema update.
     */
    public ?string $timestamp;

    /**
     * @var string|null The version of the schema.
     */
    public ?string $version;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'timestamp' => $this->timestamp ?? null,
            'version' => $this->version ?? null,
        ];
    }

}
