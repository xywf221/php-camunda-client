<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetFilterListDto implements JsonSerializable, RequestPropertiesInterface
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

    /**
     * @var bool|null If set to `true`, each filter result will contain an `itemCount` property
     * with the number of items matched by the filter itself.
     */
    public ?bool $itemCount;

    /**
     * @var string|null Sort the results lexicographically by a given criterion.
     * Must be used in conjunction with the sortOrder parameter.
     */
    public ?string $sortBy;

    /**
     * @var string|null Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     */
    public ?string $sortOrder;

    /**
     * @var int|null Pagination of results. Specifies the index of the first result to return.
     */
    public ?int $firstResult;

    /**
     * @var int|null Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     */
    public ?int $maxResults;


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
            'itemCount' => $this->itemCount ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
