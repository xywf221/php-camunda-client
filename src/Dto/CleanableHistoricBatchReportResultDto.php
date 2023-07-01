<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CleanableHistoricBatchReportResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The type of the batch operation.
     */
    public ?string $batchType;

    /**
     * @var int|null The history time to live of the batch operation.
     */
    public ?int $historyTimeToLive;

    /**
     * @var int|null The count of the finished batch operations.
     */
    public ?int $finishedBatchesCount;

    /**
     * @var int|null The count of the cleanable historic batch operations, referring to history time to
     * live.
     */
    public ?int $cleanableBatchesCount;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'batchType' => $this->batchType ?? null,
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
            'finishedBatchesCount' => $this->finishedBatchesCount ?? null,
            'cleanableBatchesCount' => $this->cleanableBatchesCount ?? null,
        ];
    }

}
