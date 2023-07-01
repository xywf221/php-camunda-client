<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the job definition.
     */
    public ?string $id;

    /**
     * @var string|null The id of the process definition this job definition is associated with.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition this job definition is associated with.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the activity this job definition is associated with.
     */
    public ?string $activityId;

    /**
     * @var string|null The type of the job which is running for this job definition.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/the-job-executor/#job-creation for more information about job types
     */
    public ?string $jobType;

    /**
     * @var string|null The configuration of a job definition provides details about the jobs which will be
     * created. For example: for timer jobs it is the timer configuration.
     */
    public ?string $jobConfiguration;

    /**
     * @var int|null The execution priority defined for jobs that are created based on this definition.
     * May be `null` when the priority has not been overridden on the job
     * definition level.
     */
    public ?int $overridingJobPriority;

    /**
     * @var bool|null Indicates whether this job definition is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var string|null The id of the tenant this job definition is associated with.
     */
    public ?string $tenantId;

    /**
     * @var string|null The id of the deployment this job definition is related to. In a deployment-aware
     * setup, this leads to all jobs of the same definition being executed
     * on the same node.
     */
    public ?string $deploymentId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'activityId' => $this->activityId ?? null,
            'jobType' => $this->jobType ?? null,
            'jobConfiguration' => $this->jobConfiguration ?? null,
            'overridingJobPriority' => $this->overridingJobPriority ?? null,
            'suspended' => $this->suspended ?? null,
            'tenantId' => $this->tenantId ?? null,
            'deploymentId' => $this->deploymentId ?? null,
        ];
    }

}
