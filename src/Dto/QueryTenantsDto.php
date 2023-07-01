<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class QueryTenantsDto implements JsonSerializable, RequestPropertiesInterface
{

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

    /**
     * @var string|null Filter by the id of the tenant.
     */
    public ?string $id;

    /**
     * @var string|null Filter by the name of the tenant.
     */
    public ?string $name;

    /**
     * @var string|null Filter by the name that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Select only tenants where the given user is a member of.
     */
    public ?string $userMember;

    /**
     * @var string|null Select only tenants where the given group is a member of.
     */
    public ?string $groupMember;

    /**
     * @var bool|null Select only tenants where the user or one of his groups is a member of.
     * Can only be used in combination with the `userMember` parameter. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $includingGroupsOfUser;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'userMember' => $this->userMember ?? null,
            'groupMember' => $this->groupMember ?? null,
            'includingGroupsOfUser' => $this->includingGroupsOfUser ?? null,
        ];
    }

}
