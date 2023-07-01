<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class BatchDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the batch.
     */
    public ?string $id;

    /**
     * @var string|null The type of the batch.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/batch/#creating-a-batch for more information about batch types
     */
    public ?string $type;

    /**
     * @var int|null The total jobs of a batch is the number of batch execution jobs required to complete the batch.
     */
    public ?int $totalJobs;

    /**
     * @var int|null The number of batch execution jobs already created by the seed job.
     */
    public ?int $jobsCreated;

    /**
     * @var int|null The number of batch execution jobs created per seed job invocation.
     * The batch seed job is invoked until it has created all batch execution jobs required by the batch
     * (see `totalJobs` property).
     */
    public ?int $batchJobsPerSeed;

    /**
     * @var int|null Every batch execution job invokes the command executed by the batch `invocationsPerBatchJob` times.
     * E.g., for a process instance migration batch this specifies the number of process instances which are migrated per batch execution job.
     */
    public ?int $invocationsPerBatchJob;

    /**
     * @var string|null The job definition id for the seed jobs of this batch.
     */
    public ?string $seedJobDefinitionId;

    /**
     * @var string|null The job definition id for the monitor jobs of this batch.
     */
    public ?string $monitorJobDefinitionId;

    /**
     * @var string|null The job definition id for the batch execution jobs of this batch.
     */
    public ?string $batchJobDefinitionId;

    /**
     * @var bool|null Indicates whether this batch is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var string|null The tenant id of the batch.
     */
    public ?string $tenantId;

    /**
     * @var string|null The id of the user that created the batch.
     */
    public ?string $createUserId;

    /**
     * @var string|null The time the batch was started. Default format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`. For further information,
     * please see the [documentation] (https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     */
    public ?string $startTime;

    /**
     * @var string|null The time the batch execution was started, i.e., at least one batch job has been executed. Default
     * format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`. For further information, please see the [documentation]
     * (https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     */
    public ?string $executionStartTime;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'totalJobs' => $this->totalJobs ?? null,
            'jobsCreated' => $this->jobsCreated ?? null,
            'batchJobsPerSeed' => $this->batchJobsPerSeed ?? null,
            'invocationsPerBatchJob' => $this->invocationsPerBatchJob ?? null,
            'seedJobDefinitionId' => $this->seedJobDefinitionId ?? null,
            'monitorJobDefinitionId' => $this->monitorJobDefinitionId ?? null,
            'batchJobDefinitionId' => $this->batchJobDefinitionId ?? null,
            'suspended' => $this->suspended ?? null,
            'tenantId' => $this->tenantId ?? null,
            'createUserId' => $this->createUserId ?? null,
            'startTime' => $this->startTime ?? null,
            'executionStartTime' => $this->executionStartTime ?? null,
        ];
    }

}
