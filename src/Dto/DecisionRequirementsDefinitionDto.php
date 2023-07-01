<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DecisionRequirementsDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision requirements definition.
     */
    public ?string $id;

    /**
     * @var string|null The key of the decision requirements definition.
     */
    public ?string $key;

    /**
     * @var string|null The category of the decision requirements definition.
     */
    public ?string $category;

    /**
     * @var string|null The name of the decision requirements definition.
     */
    public ?string $name;

    /**
     * @var int|null The version of the decision requirements definition that the engine assigned to
     * it.
     */
    public ?int $version;

    /**
     * @var string|null The file name of the decision requirements definition.
     */
    public ?string $resource;

    /**
     * @var string|null The deployment id of the decision requirements definition.
     */
    public ?string $deploymentId;

    /**
     * @var string|null The tenant id of the decision requirements definition.
     */
    public ?string $tenantId;


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
        ];
    }

}
