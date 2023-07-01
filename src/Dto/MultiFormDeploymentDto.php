<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MultiFormDeploymentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The tenant id for the deployment to be created.
     */
    public ?string $tenantId;

    /**
     * @var string|null The source for the deployment to be created.
     */
    public ?string $deploymentSource;

    /**
     * @var bool|null A flag indicating whether the process engine should perform duplicate checking on a per-resource basis.
     * If set to true, only those resources that have actually changed are deployed.
     * Checks are made against resources included previous deployments of the same name and only against the latest versions of those resources.
     * If set to true, the option enable-duplicate-filtering is overridden and set to true.
     */
    public ?bool $deployChangedOnly = false;

    /**
     * @var bool|null A flag indicating whether the process engine should perform duplicate checking for the deployment or not.
     * This allows you to check if a deployment with the same name and the same resouces already exists and
     * if true, not create a new deployment but instead return the existing deployment. The default value is false.
     */
    public ?bool $enableDuplicateFiltering = false;

    /**
     * @var string|null The name for the deployment to be created.
     */
    public ?string $deploymentName;

    /**
     * @var string|null Sets the date on which the process definitions contained in this deployment will be activated. This means that all process
     * definitions will be deployed as usual, but they will be suspended from the start until the given activation date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $deploymentActivationTime;

    /**
     * @var mixed|null The binary data to create the deployment resource.
     * It is possible to have more than one form part with different form part names for the binary data to create a deployment.
     */
    public mixed $data;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'tenant-id' => $this->tenantId ?? null,
            'deployment-source' => $this->deploymentSource ?? null,
            'deploy-changed-only' => $this->deployChangedOnly ?? null,
            'enable-duplicate-filtering' => $this->enableDuplicateFiltering ?? null,
            'deployment-name' => $this->deploymentName ?? null,
            'deployment-activation-time' => $this->deploymentActivationTime ?? null,
            'data' => $this->data ?? null,
        ];
    }

    public function multipart(): array
    {
        return [
            [
                'name' => 'tenant-id',
                'contents' => $this->tenantId ?? null,
            ],
            [
                'name' => 'deployment-source',
                'contents' => $this->deploymentSource ?? null,
            ],
            [
                'name' => 'deploy-changed-only',
                'contents' => $this->deployChangedOnly ?? null,
            ],
            [
                'name' => 'enable-duplicate-filtering',
                'contents' => $this->enableDuplicateFiltering ?? null,
            ],
            [
                'name' => 'deployment-name',
                'contents' => $this->deploymentName ?? null,
            ],
            [
                'name' => 'deployment-activation-time',
                'contents' => $this->deploymentActivationTime ?? null,
            ],
            [
                'name' => 'data',
                'contents' => $this->data ?? null,
            ]
        ];
    }
}
