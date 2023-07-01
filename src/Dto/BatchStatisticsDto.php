<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class BatchStatisticsDto extends BatchDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The number of remaining batch execution jobs. This does include failed batch execution jobs and
     * batch execution jobs which still have to be created by the seed job.
     */
    public ?int $remainingJobs;

    /**
     * @var int|null The number of completed batch execution jobs. This does include aborted/deleted batch execution jobs.
     */
    public ?int $completedJobs;

    /**
     * @var int|null The number of failed batch execution jobs. This does not include aborted or deleted batch execution jobs.
     */
    public ?int $failedJobs;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'remainingJobs' => $this->remainingJobs ?? null,
            'completedJobs' => $this->completedJobs ?? null,
            'failedJobs' => $this->failedJobs ?? null,
        ];
    }

}
