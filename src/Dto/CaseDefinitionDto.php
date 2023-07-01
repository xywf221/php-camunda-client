<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CaseDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the case definition
     */
    public ?string $id;

    /**
     * @var string|null The key of the case definition, i.e., the id of the CMMN 2.0 XML case definition.
     */
    public ?string $key;

    /**
     * @var string|null The category of the case definition.
     */
    public ?string $category;

    /**
     * @var string|null The name of the case definition.
     */
    public ?string $name;

    /**
     * @var int|null The version of the case definition that the engine assigned to it.
     */
    public ?int $version;

    /**
     * @var string|null The file name of the case definition.
     */
    public ?string $resource;

    /**
     * @var string|null The deployment id of the case definition.
     */
    public ?string $deploymentId;

    /**
     * @var string|null The tenant id of the case definition.
     */
    public ?string $tenantId;

    /**
     * @var int|null History time to live value of the case definition.
     * Is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     */
    public ?int $historyTimeToLive;


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
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
        ];
    }

}
