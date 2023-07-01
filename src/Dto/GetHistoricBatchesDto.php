<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricBatchesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by batch id.
     */
    public ?string $batchId;

    /**
     * @var string|null Filter by batch type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/batch/#creating-a-batch for more information about batch types
     */
    public ?string $type;

    /**
     * @var bool|null
     * Filter completed or not completed batches. If the value is
     * `true`, only completed batches, i.e., end time is set, are
     * returned. Otherwise, if the value is `false`, only running
     * batches, i.e., end time is null, are returned.
     */
    public ?bool $completed;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A batch matches if it has one of the given
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include batches which belong to no tenant. Value can effectively only be `true`, as `false` is the default behavior.
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
            'batchId' => $this->batchId ?? null,
            'type' => $this->type ?? null,
            'completed' => $this->completed ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
