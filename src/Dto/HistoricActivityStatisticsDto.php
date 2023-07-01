<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricActivityStatisticsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the activity the results are aggregated for.
     */
    public ?string $id;

    /**
     * @var int|null The total number of all running instances of the activity.
     */
    public ?int $instances;

    /**
     * @var int|null The total number of all canceled instances of the activity. **Note:** Will be `0`
     * (not `null`), if canceled activity instances were excluded.
     */
    public ?int $canceled;

    /**
     * @var int|null The total number of all finished instances of the activity. **Note:** Will be `0`
     * (not `null`), if finished activity instances were excluded.
     */
    public ?int $finished;

    /**
     * @var int|null The total number of all instances which completed a scope of the activity.
     **Note:** Will be `0` (not `null`), if activity instances which
     * completed a scope were excluded.
     */
    public ?int $completeScope;

    /**
     * @var int|null The total number of open incidents for the activity. **Note:** Will be `0` (not
     * `null`), if `incidents` is set to `false`.
     */
    public ?int $openIncidents;

    /**
     * @var int|null The total number of resolved incidents for the activity. **Note:** Will be `0` (not
     * `null`), if `incidents` is set to `false`.
     */
    public ?int $resolvedIncidents;

    /**
     * @var int|null The total number of deleted incidents for the activity. **Note:** Will be `0` (not
     * `null`), if `incidents` is set to `false`.
     */
    public ?int $deletedIncidents;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'instances' => $this->instances ?? null,
            'canceled' => $this->canceled ?? null,
            'finished' => $this->finished ?? null,
            'completeScope' => $this->completeScope ?? null,
            'openIncidents' => $this->openIncidents ?? null,
            'resolvedIncidents' => $this->resolvedIncidents ?? null,
            'deletedIncidents' => $this->deletedIncidents ?? null,
        ];
    }

}
