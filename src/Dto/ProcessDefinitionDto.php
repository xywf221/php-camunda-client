<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the process definition
     */
    public ?string $id;

    /**
     * @var string|null The key of the process definition, i.e., the id of the BPMN 2.0 XML process definition.
     */
    public ?string $key;

    /**
     * @var string|null The category of the process definition.
     */
    public ?string $category;

    /**
     * @var string|null The description of the process definition.
     */
    public ?string $description;

    /**
     * @var string|null The name of the process definition.
     */
    public ?string $name;

    /**
     * @var int|null The version of the process definition that the engine assigned to it.
     */
    public ?int $version;

    /**
     * @var string|null The file name of the process definition.
     */
    public ?string $resource;

    /**
     * @var string|null The deployment id of the process definition.
     */
    public ?string $deploymentId;

    /**
     * @var string|null The file name of the process definition diagram, if it exists.
     */
    public ?string $diagram;

    /**
     * @var bool|null A flag indicating whether the definition is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var string|null The tenant id of the process definition.
     */
    public ?string $tenantId;

    /**
     * @var string|null The version tag of the process definition.
     */
    public ?string $versionTag;

    /**
     * @var int|null History time to live value of the process definition.
     * Is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     */
    public ?int $historyTimeToLive;

    /**
     * @var bool|null A flag indicating whether the process definition is startable in Tasklist or not.
     */
    public ?bool $startableInTasklist;


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
            'description' => $this->description ?? null,
            'name' => $this->name ?? null,
            'version' => $this->version ?? null,
            'resource' => $this->resource ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'diagram' => $this->diagram ?? null,
            'suspended' => $this->suspended ?? null,
            'tenantId' => $this->tenantId ?? null,
            'versionTag' => $this->versionTag ?? null,
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
            'startableInTasklist' => $this->startableInTasklist ?? null,
        ];
    }

}
