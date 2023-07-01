<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricTaskInstanceReportResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the task. It is only available when the `groupBy` parameter is set to `taskName`.
     * Else the value is `null`.
     **Note:** This property is only set for a historic task report object.
     * In these cases, the value of the `reportType` query parameter is `count`.
     */
    public ?string $taskName;

    /**
     * @var int|null The number of tasks which have the given definition.
     **Note:** This property is only set for a historic task report object.
     * In these cases, the value of the `reportType` query parameter is `count`.
     */
    public ?int $count;

    /**
     * @var string|null The key of the process definition.
     **Note:** This property is only set for a historic task report object.
     * In these cases, the value of the `reportType` query parameter is `count`.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process definition.
     **Note:** This property is only set for a historic task report object.
     * In these cases, the value of the `reportType` query parameter is `count`.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The name of the process definition.
     **Note:** This property is only set for a historic task report object.
     * In these cases, the value of the `reportType` query parameter is `count`.
     */
    public ?string $processDefinitionName;

    /**
     * @var int|null Specifies a span of time within a year.
     **Note:** The period must be interpreted in conjunction with the returned `periodUnit`.
     **Note:** This property is only set for a duration report object.
     * In these cases, the value of the `reportType` query parameter is `duration`.
     */
    public ?int $period;

    /**
     * @var string|null The unit of the given period. Possible values are `MONTH` and `QUARTER`.
     **Note:** This property is only set for a duration report object.
     * In these cases, the value of the `reportType` query parameter is `duration`.
     */
    public ?string $periodUnit;

    /**
     * @var int|null The smallest duration in milliseconds of all completed process instances which
     * were started in the given period.
     **Note:** This property is only set for a duration report object.
     * In these cases, the value of the `reportType` query parameter is `duration`.
     */
    public ?int $minimum;

    /**
     * @var int|null The greatest duration in milliseconds of all completed process instances which were
     * started in the given period.
     **Note:** This property is only set for a duration report object.
     * In these cases, the value of the `reportType` query parameter is `duration`.
     */
    public ?int $maximum;

    /**
     * @var int|null The average duration in milliseconds of all completed process instances which were
     * started in the given period.
     **Note:** This property is only set for a duration report object.
     * In these cases, the value of the `reportType` query parameter is `duration`.
     */
    public ?int $average;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'taskName' => $this->taskName ?? null,
            'count' => $this->count ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'period' => $this->period ?? null,
            'periodUnit' => $this->periodUnit ?? null,
            'minimum' => $this->minimum ?? null,
            'maximum' => $this->maximum ?? null,
            'average' => $this->average ?? null,
        ];
    }

}
