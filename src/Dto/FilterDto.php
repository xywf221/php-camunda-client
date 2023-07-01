<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class FilterDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the filter.
     */
    public ?string $id;

    /**
     * @var string|null The resource type of the filter.
     */
    public ?string $resourceType;

    /**
     * @var string|null The name of the filter.
     */
    public ?string $name;

    /**
     * @var string|null The user id of the owner of the filter.
     */
    public ?string $owner;

    /**
     * @var object The query of the filter as a JSON object.
     */
    public object $query;

    /**
     * @var object The properties of a filter as a JSON object.
     */
    public object $properties;

    /**
     * @var int|null
     * The number of items matched by the filter itself. Note: Only exists
     * if the query parameter
     * `itemCount` was set to `true`
     */
    public ?int $itemCount;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'resourceType' => $this->resourceType ?? null,
            'name' => $this->name ?? null,
            'owner' => $this->owner ?? null,
            'query' => $this->query ?? null,
            'properties' => $this->properties ?? null,
            'itemCount' => $this->itemCount ?? null,
        ];
    }

}
