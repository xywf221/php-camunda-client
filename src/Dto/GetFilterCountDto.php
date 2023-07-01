<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetFilterCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the id of the filter.
     */
    public ?string $filterId;

    /**
     * @var string|null Filter by the resource type of the filter, e.g., `Task`.
     */
    public ?string $resourceType;

    /**
     * @var string|null Filter by the name of the filter.
     */
    public ?string $name;

    /**
     * @var string|null Filter by the name that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the user id of the owner of the filter.
     */
    public ?string $owner;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'filterId' => $this->filterId ?? null,
            'resourceType' => $this->resourceType ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'owner' => $this->owner ?? null,
        ];
    }

}
