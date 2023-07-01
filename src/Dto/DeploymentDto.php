<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeploymentDto extends LinkableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the deployment.
     */
    public ?string $id;

    /**
     * @var string|null The tenant id of the deployment.
     */
    public ?string $tenantId;

    /**
     * @var string|null The time when the deployment was created.
     */
    public ?string $deploymentTime;

    /**
     * @var string|null The source of the deployment.
     */
    public ?string $source;

    /**
     * @var string|null The name of the deployment.
     */
    public ?string $name;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'tenantId' => $this->tenantId ?? null,
            'deploymentTime' => $this->deploymentTime ?? null,
            'source' => $this->source ?? null,
            'name' => $this->name ?? null,
        ];
    }

}
