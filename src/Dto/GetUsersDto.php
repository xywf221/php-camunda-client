<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetUsersDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by user id
     */
    public ?string $id;

    /**
     * @var string|null Filter by a comma-separated list of user ids.
     */
    public ?string $idIn;

    /**
     * @var string|null Filter by the first name of the user. Exact match.
     */
    public ?string $firstName;

    /**
     * @var string|null Filter by the first name that the parameter is a substring of.
     */
    public ?string $firstNameLike;

    /**
     * @var string|null Filter by the last name of the user. Exact match.
     */
    public ?string $lastName;

    /**
     * @var string|null Filter by the last name that the parameter is a substring of.
     */
    public ?string $lastNameLike;

    /**
     * @var string|null Filter by the email of the user. Exact match.
     */
    public ?string $email;

    /**
     * @var string|null Filter by the email that the parameter is a substring of.
     */
    public ?string $emailLike;

    /**
     * @var string|null Filter for users which are members of the given group.
     */
    public ?string $memberOfGroup;

    /**
     * @var string|null Filter for users which are members of the given tenant.
     */
    public ?string $memberOfTenant;

    /**
     * @var string|null Only select Users that are potential starter for the given process definition.
     */
    public ?string $potentialStarter;

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
            'id' => $this->id ?? null,
            'idIn' => $this->idIn ?? null,
            'firstName' => $this->firstName ?? null,
            'firstNameLike' => $this->firstNameLike ?? null,
            'lastName' => $this->lastName ?? null,
            'lastNameLike' => $this->lastNameLike ?? null,
            'email' => $this->email ?? null,
            'emailLike' => $this->emailLike ?? null,
            'memberOfGroup' => $this->memberOfGroup ?? null,
            'memberOfTenant' => $this->memberOfTenant ?? null,
            'potentialStarter' => $this->potentialStarter ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
