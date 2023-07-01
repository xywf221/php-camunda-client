<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeploymentResourceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the deployment resource.
     */
    public ?string $id;

    /**
     * @var string|null The name of the deployment resource
     */
    public ?string $name;

    /**
     * @var string|null The id of the deployment.
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
            'name' => $this->name ?? null,
            'deploymentId' => $this->deploymentId ?? null,
        ];
    }

}
