<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricProcessInstanceDurationReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory.** Specifies the type of the report to retrieve.
     * To retrieve a report about the duration of process instances, the value must be set to `duration`.
     */
    public string $reportType;

    /**
     * @var string **Mandatory.** Specifies the granularity of the report. Valid values are `month` and `quarter`.
     */
    public string $periodUnit;

    /**
     * @var string|null Filter by process definition ids. Must be a comma-separated list of process definition ids.
     */
    public ?string $processDefinitionIdIn;

    /**
     * @var string|null Filter by process definition keys. Must be a comma-separated list of process definition keys.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Restrict to instances that were started before the given date.
     * By [default](), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2016-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Restrict to instances that were started after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2016-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'reportType' => $this->reportType ?? null,
            'periodUnit' => $this->periodUnit ?? null,
            'processDefinitionIdIn' => $this->processDefinitionIdIn ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
        ];
    }

}
