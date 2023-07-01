<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetDeploymentsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by deployment id
     */
    public ?string $id;

    /**
     * @var string|null Filter by the deployment name. Exact match.
     */
    public ?string $name;

    /**
     * @var string|null Filter by the deployment name that the parameter is a substring of. The parameter can include the
     * wildcard `%` to express like-strategy such as: starts with (`%`name), ends with (name`%`) or contains
     * (`%`name`%`).
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the deployment source.
     */
    public ?string $source;

    /**
     * @var bool|null Filter by the deployment source whereby source is equal to `null`.
     */
    public ?bool $withoutSource;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A deployment must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include deployments which belong to no tenant. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include deployments which belong to no tenant. Can be used in combination with `tenantIdIn`. Value may
     * only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeDeploymentsWithoutTenantId;

    /**
     * @var string|null Restricts to all deployments after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $after;

    /**
     * @var string|null Restricts to all deployments before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $before;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'source' => $this->source ?? null,
            'withoutSource' => $this->withoutSource ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeDeploymentsWithoutTenantId' => $this->includeDeploymentsWithoutTenantId ?? null,
            'after' => $this->after ?? null,
            'before' => $this->before ?? null,
        ];
    }

}
