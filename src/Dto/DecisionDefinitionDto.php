<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DecisionDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision definition
     */
    public ?string $id;

    /**
     * @var string|null The key of the decision definition, i.e., the id of the DMN 1.0 XML decision definition.
     */
    public ?string $key;

    /**
     * @var string|null The category of the decision definition.
     */
    public ?string $category;

    /**
     * @var string|null The name of the decision definition.
     */
    public ?string $name;

    /**
     * @var int|null The version of the decision definition that the engine assigned to it.
     */
    public ?int $version;

    /**
     * @var string|null The file name of the decision definition.
     */
    public ?string $resource;

    /**
     * @var string|null The deployment id of the decision definition.
     */
    public ?string $deploymentId;

    /**
     * @var string|null The tenant id of the decision definition.
     */
    public ?string $tenantId;

    /**
     * @var string|null The id of the decision requirements definition this decision definition belongs to.
     */
    public ?string $decisionRequirementsDefinitionId;

    /**
     * @var string|null The key of the decision requirements definition this decision definition belongs to.
     */
    public ?string $decisionRequirementsDefinitionKey;

    /**
     * @var int|null History time to live value of the decision definition.
     * Is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     */
    public ?int $historyTimeToLive;

    /**
     * @var string|null The version tag of the decision definition.
     */
    public ?string $versionTag;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'key' => $this->key ?? null,
            'category' => $this->category ?? null,
            'name' => $this->name ?? null,
            'version' => $this->version ?? null,
            'resource' => $this->resource ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'decisionRequirementsDefinitionId' => $this->decisionRequirementsDefinitionId ?? null,
            'decisionRequirementsDefinitionKey' => $this->decisionRequirementsDefinitionKey ?? null,
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
            'versionTag' => $this->versionTag ?? null,
        ];
    }

}
