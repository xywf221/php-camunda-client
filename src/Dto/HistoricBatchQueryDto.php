<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricBatchQueryDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var array<string>|null Filter by a comma-separated list of tenant ids. A batch matches if it has one of the given
     * tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include batches which belong to no tenant. Value can effectively only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var array<object>|null An array of criteria to sort the result by. Each element of the array is
     * an object that specifies one ordering. The position in the array
     * identifies the rank of an ordering, i.e., whether it is primary, secondary,
     * etc. Has no effect for the `/count` endpoint
     */
    public ?array $sorting;


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
            'sorting' => $this->sorting ?? null,
        ];
    }

}
