<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetQueryGroupsDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var string|null Filter by the id of the group.
     */
    public ?string $id;

    /**
     * @var string|null Filter by a comma seperated list of group ids.
     */
    public ?string $idIn;

    /**
     * @var string|null Filter by the name of the group.
     */
    public ?string $name;

    /**
     * @var string|null Filter by the name that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the type of the group.
     */
    public ?string $type;

    /**
     * @var string|null Only retrieve groups where the given user id is a member of.
     */
    public ?string $member;

    /**
     * @var string|null Only retrieve groups which are members of the given tenant.
     */
    public ?string $memberOfTenant;


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
            'idIn' => $this->idIn ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'type' => $this->type ?? null,
            'member' => $this->member ?? null,
            'memberOfTenant' => $this->memberOfTenant ?? null,
        ];
    }

}
