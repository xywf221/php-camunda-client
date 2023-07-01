<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetCleanableHistoricProcessInstanceReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by process definition ids. Must be a comma-separated list of process definition ids.
     */
    public ?string $processDefinitionIdIn;

    /**
     * @var string|null Filter by process definition keys. Must be a comma-separated list of process definition keys.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A process definition must have one of the given
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include process definitions which belong to no tenant. Value may only be `true`, as
     * `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Only include process instances which have more than zero finished instances. Value may
     * only be `true`, as `false` is the default behavior.
     */
    public ?bool $compact;

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
            'processDefinitionIdIn' => $this->processDefinitionIdIn ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'compact' => $this->compact ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
