<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SchemaLogQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The version of the schema.
     */
    public ?string $version;

    /**
     * @var array<object>|null A JSON array of criteria to sort the result by. Each element of the array is
     * a JSON object that specifies one ordering. The position in the array
     * identifies the rank of an ordering, i.e., whether it is primary, secondary,
     * etc.
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'version' => $this->version ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
