<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MetricsResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The current sum (count) for the selected metric.
     */
    public ?int $result;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'result' => $this->result ?? null,
        ];
    }

}
