<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetBatchStatisticsDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var string|null Filter by batch id.
     */
    public ?string $batchId;

    /**
     * @var string|null Filter by batch type.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/batch/#creating-a-batch for more information about batch types
     */
    public ?string $type;

    /**
     * @var string|null Filter by a comma-separated list of `Strings`. A batch matches if it has one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include batches which belong to no tenant.
     * Value can effectively only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null A `Boolean` value which indicates whether only active or suspended batches should be included.
     * When the value is set to `true`, only suspended batches will be returned and
     * when the value is set to `false`, only active batches will be returned.
     */
    public ?bool $suspended;

    /**
     * @var string|null Only include batches that were started by this user id.
     */
    public ?string $createdBy;

    /**
     * @var string|null Only include batches that were started before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Only include batches that were started after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;

    /**
     * @var bool|null Only include batches having jobs with failures.
     * Value can only be `true`.
     */
    public ?bool $withFailures;

    /**
     * @var bool|null Only include batches having jobs without failures.
     * Value can only be `true`.
     */
    public ?bool $withoutFailures;


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
            'batchId' => $this->batchId ?? null,
            'type' => $this->type ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'suspended' => $this->suspended ?? null,
            'createdBy' => $this->createdBy ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
            'withFailures' => $this->withFailures ?? null,
            'withoutFailures' => $this->withoutFailures ?? null,
        ];
    }

}
