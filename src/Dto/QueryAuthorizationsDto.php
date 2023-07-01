<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class QueryAuthorizationsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the id of the authorization.
     */
    public ?string $id;

    /**
     * @var int|null Filter by authorization type. (0=global, 1=grant, 2=revoke).
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#authorization-type for more information about authorization types
     */
    public ?int $type;

    /**
     * @var string|null Filter by a comma-separated list of userIds.
     */
    public ?string $userIdIn;

    /**
     * @var string|null Filter by a comma-separated list of groupIds.
     */
    public ?string $groupIdIn;

    /**
     * @var int|null Filter by an integer representation of the resource type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/authorization-service/#resources for a list of integer representations of resource types
     */
    public ?int $resourceType;

    /**
     * @var string|null Filter by resource id.
     */
    public ?string $resourceId;

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
            'type' => $this->type ?? null,
            'userIdIn' => $this->userIdIn ?? null,
            'groupIdIn' => $this->groupIdIn ?? null,
            'resourceType' => $this->resourceType ?? null,
            'resourceId' => $this->resourceId ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
