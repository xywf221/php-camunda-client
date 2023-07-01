<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricActivityStatisticsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Whether to include the number of canceled activity instances in the result or not. Valid
     * values are `true` or `false`. Default: `false`.
     */
    public ?bool $canceled;

    /**
     * @var bool|null Whether to include the number of finished activity instances in the result or not. Valid
     * values are `true` or `false`. Default: `false`.
     */
    public ?bool $finished;

    /**
     * @var bool|null Whether to include the number of activity instances which completed a scope in the result
     * or not. Valid values are `true` or `false`. Default: `false`.
     */
    public ?bool $completeScope;

    /**
     * @var bool|null Whether to include the number of incidents. Valid values are `true` or `false`. Default: `false`.
     */
    public ?bool $incidents;

    /**
     * @var string|null Restrict to process instances that were started before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Restrict to process instances that were started after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;

    /**
     * @var string|null Restrict to process instances that were finished before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedBefore;

    /**
     * @var string|null Restrict to process instances that were finished after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedAfter;

    /**
     * @var string|null Restrict to process instances with the given IDs. The IDs must be provided as a comma-
     * separated list.
     */
    public ?string $processInstanceIdIn;

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


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'canceled' => $this->canceled ?? null,
            'finished' => $this->finished ?? null,
            'completeScope' => $this->completeScope ?? null,
            'incidents' => $this->incidents ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
            'finishedBefore' => $this->finishedBefore ?? null,
            'finishedAfter' => $this->finishedAfter ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
        ];
    }

}
