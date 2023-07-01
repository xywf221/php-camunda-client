<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricIdentityLinksDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Restricts to identity links that have the given type (candidate/assignee/owner).
     */
    public ?string $type;

    /**
     * @var string|null Restricts to identity links that have the given user id.
     */
    public ?string $userId;

    /**
     * @var string|null Restricts to identity links that have the given group id.
     */
    public ?string $groupId;

    /**
     * @var string|null Restricts to identity links that have the time before the given time.
     */
    public ?string $dateBefore;

    /**
     * @var string|null Restricts to identity links that have the time after the given time.
     */
    public ?string $dateAfter;

    /**
     * @var string|null Restricts to identity links that have the given task id.
     */
    public ?string $taskId;

    /**
     * @var string|null Restricts to identity links that have the given process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Restricts to identity links that have the given process definition key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Restricts to identity links that have the given operationType (add/delete).
     */
    public ?string $operationType;

    /**
     * @var string|null Restricts to identity links that have the given assigner id.
     */
    public ?string $assignerId;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic identity links that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

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
            'type' => $this->type ?? null,
            'userId' => $this->userId ?? null,
            'groupId' => $this->groupId ?? null,
            'dateBefore' => $this->dateBefore ?? null,
            'dateAfter' => $this->dateAfter ?? null,
            'taskId' => $this->taskId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'operationType' => $this->operationType ?? null,
            'assignerId' => $this->assignerId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
