<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetDecisionDefinitionsDto implements JsonSerializable, RequestPropertiesInterface
{

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

    /**
     * @var string|null Filter by decision definition id.
     */
    public ?string $decisionDefinitionId;

    /**
     * @var string|null Filter by decision definition ids.
     */
    public ?string $decisionDefinitionIdIn;

    /**
     * @var string|null Filter by decision definition name.
     */
    public ?string $name;

    /**
     * @var string|null Filter by decision definition names that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the deployment the id belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Filter by the deploy time of the deployment the decision definition belongs to.
     * Only selects decision definitions that have been deployed after (exclusive) a specific time.
     */
    public ?string $deployedAfter;

    /**
     * @var string|null Filter by the deploy time of the deployment the decision definition belongs to.
     * Only selects decision definitions that have been deployed at a specific time (exact match).
     */
    public ?string $deployedAt;

    /**
     * @var string|null Filter by decision definition key, i.e., the id in the DMN 1.0 XML. Exact match.
     */
    public ?string $key;

    /**
     * @var string|null Filter by decision definition keys that the parameter is a substring of.
     */
    public ?string $keyLike;

    /**
     * @var string|null Filter by decision definition category. Exact match.
     */
    public ?string $category;

    /**
     * @var string|null Filter by decision definition categories that the parameter is a substring of.
     */
    public ?string $categoryLike;

    /**
     * @var int|null Filter by decision definition version.
     */
    public ?int $version;

    /**
     * @var bool|null Only include those decision definitions that are latest versions.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $latestVersion;

    /**
     * @var string|null Filter by the name of the decision definition resource. Exact match.
     */
    public ?string $resourceName;

    /**
     * @var string|null Filter by names of those decision definition resources that the parameter is a substring of.
     */
    public ?string $resourceNameLike;

    /**
     * @var string|null Filter by the id of the decision requirements definition this decision definition belongs to.
     */
    public ?string $decisionRequirementsDefinitionId;

    /**
     * @var string|null Filter by the key of the decision requirements definition this decision definition belongs to.
     */
    public ?string $decisionRequirementsDefinitionKey;

    /**
     * @var bool|null Only include decision definitions which does not belongs to any decision requirements definition.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutDecisionRequirementsDefinition;

    /**
     * @var string|null Filter by a comma-separated list of `Strings`. A decision definition must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include decision definitions which belong to no tenant.
     * Value can effectively only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include decision definitions which belong to no tenant.
     * Can be used in combination with `tenantIdIn`.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeDecisionDefinitionsWithoutTenantId;

    /**
     * @var string|null Filter by the version tag.
     */
    public ?string $versionTag;

    /**
     * @var string|null Filter by the version tags of those decision definition resources that the parameter is a substring of.
     */
    public ?string $versionTagLike;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'decisionDefinitionId' => $this->decisionDefinitionId ?? null,
            'decisionDefinitionIdIn' => $this->decisionDefinitionIdIn ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'deployedAfter' => $this->deployedAfter ?? null,
            'deployedAt' => $this->deployedAt ?? null,
            'key' => $this->key ?? null,
            'keyLike' => $this->keyLike ?? null,
            'category' => $this->category ?? null,
            'categoryLike' => $this->categoryLike ?? null,
            'version' => $this->version ?? null,
            'latestVersion' => $this->latestVersion ?? null,
            'resourceName' => $this->resourceName ?? null,
            'resourceNameLike' => $this->resourceNameLike ?? null,
            'decisionRequirementsDefinitionId' => $this->decisionRequirementsDefinitionId ?? null,
            'decisionRequirementsDefinitionKey' => $this->decisionRequirementsDefinitionKey ?? null,
            'withoutDecisionRequirementsDefinition' => $this->withoutDecisionRequirementsDefinition ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeDecisionDefinitionsWithoutTenantId' => $this->includeDecisionDefinitionsWithoutTenantId ?? null,
            'versionTag' => $this->versionTag ?? null,
            'versionTagLike' => $this->versionTagLike ?? null,
        ];
    }

}
