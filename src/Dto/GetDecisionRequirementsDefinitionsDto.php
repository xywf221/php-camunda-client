<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetDecisionRequirementsDefinitionsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by decision requirements definition id.
     */
    public ?string $decisionRequirementsDefinitionId;

    /**
     * @var string|null Filter by decision requirements definition ids.
     */
    public ?string $decisionRequirementsDefinitionIdIn;

    /**
     * @var string|null Filter by decision requirements definition name.
     */
    public ?string $name;

    /**
     * @var string|null Filter by decision requirements definition names that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the id of the deployment a decision requirement definition belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Filter by decision requirements definition key, i.e., the id in the DMN 1.3 XML. Exact
     * match.
     */
    public ?string $key;

    /**
     * @var string|null Filter by decision requirements definition keys that the parameter is a substring of.
     */
    public ?string $keyLike;

    /**
     * @var string|null Filter by decision requirements definition category. Exact match.
     */
    public ?string $category;

    /**
     * @var string|null Filter by decision requirements definition categories that the parameter is a substring
     * of.
     */
    public ?string $categoryLike;

    /**
     * @var int|null Filter by decision requirements definition version.
     */
    public ?int $version;

    /**
     * @var bool|null Only include those decision requirements definitions that are latest versions. Value may
     * only be `true`, as `false` is the default behavior.
     */
    public ?bool $latestVersion;

    /**
     * @var string|null Filter by the name of the decision requirements definition resource. Exact match.
     */
    public ?string $resourceName;

    /**
     * @var string|null Filter by names of those decision requirements definition resources that the parameter is
     * a substring of.
     */
    public ?string $resourceNameLike;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A decision requirements definition must
     * have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include decision requirements definitions which belong to no tenant. Value may only
     * be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include decision requirements definitions which belong to no tenant. Can be used in
     * combination with `tenantIdIn`. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $includeDecisionRequirementsDefinitionsWithoutTenantId;

    /**
     * @var string|null Sort the results lexicographically by a given criterion.
     * Must be used in conjunction with the sortOrder parameter.
     */
    public ?string $sortBy;

    /**
     * @var string|null Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     */
    public ?string $sortOrder;

    /**
     * @var int|null Pagination of results. Specifies the index of the first result to return.
     */
    public ?int $firstResult;

    /**
     * @var int|null Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     */
    public ?int $maxResults;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'decisionRequirementsDefinitionId' => $this->decisionRequirementsDefinitionId ?? null,
            'decisionRequirementsDefinitionIdIn' => $this->decisionRequirementsDefinitionIdIn ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'key' => $this->key ?? null,
            'keyLike' => $this->keyLike ?? null,
            'category' => $this->category ?? null,
            'categoryLike' => $this->categoryLike ?? null,
            'version' => $this->version ?? null,
            'latestVersion' => $this->latestVersion ?? null,
            'resourceName' => $this->resourceName ?? null,
            'resourceNameLike' => $this->resourceNameLike ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeDecisionRequirementsDefinitionsWithoutTenantId' => $this->includeDecisionRequirementsDefinitionsWithoutTenantId ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
