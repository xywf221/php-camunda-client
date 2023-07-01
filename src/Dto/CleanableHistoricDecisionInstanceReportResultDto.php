<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CleanableHistoricDecisionInstanceReportResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision definition.
     */
    public ?string $decisionDefinitionId;

    /**
     * @var string|null The key of the decision definition.
     */
    public ?string $decisionDefinitionKey;

    /**
     * @var string|null The name of the decision definition.
     */
    public ?string $decisionDefinitionName;

    /**
     * @var int|null The version of the decision definition.
     */
    public ?int $decisionDefinitionVersion;

    /**
     * @var int|null The history time to live of the decision definition.
     */
    public ?int $historyTimeToLive;

    /**
     * @var int|null The count of the finished historic decision instances.
     */
    public ?int $finishedDecisionInstanceCount;

    /**
     * @var int|null The count of the cleanable historic decision instances, referring to history time
     * to live.
     */
    public ?int $cleanableDecisionInstanceCount;

    /**
     * @var string|null The tenant id of the decision definition.
     */
    public ?string $tenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'decisionDefinitionId' => $this->decisionDefinitionId ?? null,
            'decisionDefinitionKey' => $this->decisionDefinitionKey ?? null,
            'decisionDefinitionName' => $this->decisionDefinitionName ?? null,
            'decisionDefinitionVersion' => $this->decisionDefinitionVersion ?? null,
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
            'finishedDecisionInstanceCount' => $this->finishedDecisionInstanceCount ?? null,
            'cleanableDecisionInstanceCount' => $this->cleanableDecisionInstanceCount ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
