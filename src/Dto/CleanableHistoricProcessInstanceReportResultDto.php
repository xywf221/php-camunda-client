<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CleanableHistoricProcessInstanceReportResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the process definition.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The name of the process definition.
     */
    public ?string $processDefinitionName;

    /**
     * @var int|null The version of the process definition.
     */
    public ?int $processDefinitionVersion;

    /**
     * @var int|null The history time to live of the process definition.
     */
    public ?int $historyTimeToLive;

    /**
     * @var int|null The count of the finished historic process instances.
     */
    public ?int $finishedProcessInstanceCount;

    /**
     * @var int|null The count of the cleanable historic process instances, referring to history time to
     * live.
     */
    public ?int $cleanableProcessInstanceCount;

    /**
     * @var string|null The tenant id of the process definition.
     */
    public ?string $tenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'processDefinitionVersion' => $this->processDefinitionVersion ?? null,
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
            'finishedProcessInstanceCount' => $this->finishedProcessInstanceCount ?? null,
            'cleanableProcessInstanceCount' => $this->cleanableProcessInstanceCount ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
