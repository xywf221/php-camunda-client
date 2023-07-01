<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class RedeploymentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of deployment resource ids to re-deploy.
     */
    public ?array $resourceIds;

    /**
     * @var array<string>|null A list of deployment resource names to re-deploy.
     */
    public ?array $resourceNames;

    /**
     * @var string|null Sets the source of the deployment.
     */
    public ?string $source;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'resourceIds' => $this->resourceIds ?? null,
            'resourceNames' => $this->resourceNames ?? null,
            'source' => $this->source ?? null,
        ];
    }

}
