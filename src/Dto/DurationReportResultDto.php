<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DurationReportResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null Specifies a timespan within a year.
     **Note:** The period must be interpreted in conjunction with the returned `periodUnit`.
     */
    public ?int $period;

    /**
     * @var string|null The unit of the given period. Possible values are `MONTH` and `QUARTER`.
     */
    public ?string $periodUnit;

    /**
     * @var int|null The smallest duration in milliseconds of all completed process instances which were started in the given period.
     */
    public ?int $minimum;

    /**
     * @var int|null The greatest duration in milliseconds of all completed process instances which were started in the given period.
     */
    public ?int $maximum;

    /**
     * @var int|null The average duration in milliseconds of all completed process instances which were started in the given period.
     */
    public ?int $average;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'period' => $this->period ?? null,
            'periodUnit' => $this->periodUnit ?? null,
            'minimum' => $this->minimum ?? null,
            'maximum' => $this->maximum ?? null,
            'average' => $this->average ?? null,
        ];
    }

}
