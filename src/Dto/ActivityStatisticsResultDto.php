<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ActivityStatisticsResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the activity the results are aggregated for.
     */
    public ?string $id;

    /**
     * @var int The total number of running process instances of this activity.
     */
    public int $instances;

    /**
     * @var int The total number of failed jobs for the running instances.
     **Note**: Will be `0` (not `null`), if failed jobs were excluded.
     */
    public int $failedJobs;

    /**
     * @var array<IncidentStatisticsResultDto>|null Each item in the resulting array is an object which contains `incidentType` and `incidentCount`.
     **Note**: Will be an empty array, if `incidents` or `incidentsForType` were excluded.
     * Furthermore, the array will be also empty if no incidents were found.
     */
    public ?array $incidents;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'instances' => $this->instances ?? null,
            'failedJobs' => $this->failedJobs ?? null,
            'incidents' => $this->incidents ?? null,
        ];
    }

}
