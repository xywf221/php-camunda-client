<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricBatchesCountDto implements JsonSerializable, RequestPropertiesInterface
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
        ];
    }

}
