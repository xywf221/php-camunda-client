<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IntervalDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the metric.
     */
    public ?string $name;

    /**
     * @var string|null The name of the reporter (host), on which the metrics was logged. This will have
     * value provided by the [hostname configuration property](https://docs.camunda.org/manual/develop/reference/deployment-descriptors/tags/process-engine/#hostname).
     */
    public ?string $reporter;

    /**
     * @var string|null The start date (inclusive).
     */
    public ?string $startDate;

    /**
     * @var string|null The end date (exclusive).
     */
    public ?string $endDate;

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
     * @var string|null The interval for which the metrics should be aggregated. Time unit is seconds.
     * Default: The interval is set to 15 minutes (900 seconds).
     */
    public ?string $interval;

    /**
     * @var string|null Aggregate metrics by reporter.
     */
    public ?string $aggregateByReporter;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'name' => $this->name ?? null,
            'reporter' => $this->reporter ?? null,
            'startDate' => $this->startDate ?? null,
            'endDate' => $this->endDate ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'interval' => $this->interval ?? null,
            'aggregateByReporter' => $this->aggregateByReporter ?? null,
        ];
    }

}
