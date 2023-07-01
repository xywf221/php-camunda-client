<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CleanupAsyncDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null When true the job will be scheduled for nearest future. When `false`, the job will be
     * scheduled for next batch window start time. Default is `true`.
     */
    public ?bool $immediatelyDue;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'immediatelyDue' => $this->immediatelyDue ?? null,
        ];
    }

}
