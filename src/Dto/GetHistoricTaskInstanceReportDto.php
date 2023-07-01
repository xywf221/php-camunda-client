<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricTaskInstanceReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null **Mandatory.** Specifies the kind of the report to execute. To retrieve a report
     * about the duration of process instances the value must be set to `duration`. For a
     * report of the completed tasks in a specific timespan the value must be set to `count`.
     */
    public ?string $reportType;

    /**
     * @var string|null When the report type is set to `duration`, this parameter is **mandatory**.
     * Specifies the granularity of the report. Valid values are `month` and `quarter`.
     */
    public ?string $periodUnit;

    /**
     * @var string|null Restrict to tasks that were completed before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $completedBefore;

    /**
     * @var string|null Restrict to tasks that were completed after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $completedAfter;

    /**
     * @var string|null When the report type is set to `count`, this parameter is **mandatory**. Groups the
     * tasks report by a given criterion. Valid values are `taskName` and `processDefinition`.
     */
    public ?string $groupBy;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'reportType' => $this->reportType ?? null,
            'periodUnit' => $this->periodUnit ?? null,
            'completedBefore' => $this->completedBefore ?? null,
            'completedAfter' => $this->completedAfter ?? null,
            'groupBy' => $this->groupBy ?? null,
        ];
    }

}
