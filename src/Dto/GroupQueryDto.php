<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GroupQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the id of the group.
     */
    public ?string $id;

    /**
     * @var array<string>|null Filter by a JSON string array of group ids.
     */
    public ?array $idIn;

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

    /**
     * @var array<object>|null Apply sorting of the result
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'idIn' => $this->idIn ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'type' => $this->type ?? null,
            'member' => $this->member ?? null,
            'memberOfTenant' => $this->memberOfTenant ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
