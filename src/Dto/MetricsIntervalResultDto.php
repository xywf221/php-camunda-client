<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MetricsIntervalResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The interval timestamp.
     */
    public ?string $timestamp;

    /**
     * @var string|null The name of the metric.
     */
    public ?string $name;

    /**
     * @var string|null The reporter of the metric. `null` if the metrics are aggregated by reporter.
     */
    public ?string $reporter;

    /**
     * @var int|null The value of the metric aggregated by the interval.
     */
    public ?int $value;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'timestamp' => $this->timestamp ?? null,
            'name' => $this->name ?? null,
            'reporter' => $this->reporter ?? null,
            'value' => $this->value ?? null,
        ];
    }

}
