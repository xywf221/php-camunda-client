<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetMetricsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The start date (inclusive).
     */
    public ?string $startDate;

    /**
     * @var string|null The end date (exclusive).
     */
    public ?string $endDate;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'startDate' => $this->startDate ?? null,
            'endDate' => $this->endDate ?? null,
        ];
    }

}
