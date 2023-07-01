<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetProcessDefinitionsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by a comma-separated list of process definition ids.
     */
    public ?string $processDefinitionIdIn;

    /**
     * @var string|null Filter by process definition name.
     */
    public ?string $name;

    /**
     * @var string|null Filter by process definition names that the parameter is a substring of.
     */
    public ?string $nameLike;

    /**
     * @var string|null Filter by the deployment the id belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Filter by the deploy time of the deployment the process definition belongs to.
     * Only selects process definitions that have been deployed after (exclusive) a specific time.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the
     * format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g.,
     * `2013-01-23T14:42:45.546+0200`.
     */
    public ?string $deployedAfter;

    /**
     * @var string|null Filter by the deploy time of the deployment the process definition belongs to.
     * Only selects process definitions that have been deployed at a specific time (exact match).
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the
     * format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g.,
     * `2013-01-23T14:42:45.546+0200`.
     */
    public ?string $deployedAt;

    /**
     * @var string|null Filter by process definition key, i.e., the id in the BPMN 2.0 XML. Exact match.
     */
    public ?string $key;

    /**
     * @var string|null Filter by a comma-separated list of process definition keys.
     */
    public ?string $keysIn;

    /**
     * @var string|null Filter by process definition keys that the parameter is a substring of.
     */
    public ?string $keyLike;

    /**
     * @var string|null Filter by process definition category. Exact match.
     */
    public ?string $category;

    /**
     * @var string|null Filter by process definition categories that the parameter is a substring of.
     */
    public ?string $categoryLike;

    /**
     * @var int|null Filter by process definition version.
     */
    public ?int $version;

    /**
     * @var bool|null Only include those process definitions that are latest versions.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $latestVersion;

    /**
     * @var string|null Filter by the name of the process definition resource. Exact match.
     */
    public ?string $resourceName;

    /**
     * @var string|null Filter by names of those process definition resources that the parameter is a substring of.
     */
    public ?string $resourceNameLike;

    /**
     * @var string|null Filter by a user name who is allowed to start the process.
     */
    public ?string $startableBy;

    /**
     * @var bool|null Only include active process definitions.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended process definitions.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $suspended;

    /**
     * @var string|null Filter by the incident id.
     */
    public ?string $incidentId;

    /**
     * @var string|null Filter by the incident type.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
     */
    public ?string $incidentType;

    /**
     * @var string|null Filter by the incident message. Exact match.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null Filter by the incident message that the parameter is a substring of.
     */
    public ?string $incidentMessageLike;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids.
     * A process definition must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include process definitions which belong to no tenant.
     * Value may only be true, as false is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Include process definitions which belong to no tenant. Can be used in combination with `tenantIdIn`.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeProcessDefinitionsWithoutTenantId;

    /**
     * @var string|null Filter by the version tag.
     */
    public ?string $versionTag;

    /**
     * @var string|null Filter by the version tag that the parameter is a substring of.
     */
    public ?string $versionTagLike;

    /**
     * @var bool|null Only include process definitions without a `versionTag`.
     */
    public ?bool $withoutVersionTag;

    /**
     * @var bool|null Filter by process definitions which are startable in Tasklist..
     */
    public ?bool $startableInTasklist;

    /**
     * @var bool|null Filter by process definitions which are not startable in Tasklist.
     */
    public ?bool $notStartableInTasklist;

    /**
     * @var bool|null Filter by process definitions which the user is allowed to start in Tasklist.
     * If the user doesn't have these permissions the result will be empty list.
     * The permissions are:
     * `CREATE` permission for all Process instances
     * `CREATE_INSTANCE` and `READ` permission on Process definition level
     */
    public ?bool $startablePermissionCheck;

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
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionIdIn' => $this->processDefinitionIdIn ?? null,
            'name' => $this->name ?? null,
            'nameLike' => $this->nameLike ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'deployedAfter' => $this->deployedAfter ?? null,
            'deployedAt' => $this->deployedAt ?? null,
            'key' => $this->key ?? null,
            'keysIn' => $this->keysIn ?? null,
            'keyLike' => $this->keyLike ?? null,
            'category' => $this->category ?? null,
            'categoryLike' => $this->categoryLike ?? null,
            'version' => $this->version ?? null,
            'latestVersion' => $this->latestVersion ?? null,
            'resourceName' => $this->resourceName ?? null,
            'resourceNameLike' => $this->resourceNameLike ?? null,
            'startableBy' => $this->startableBy ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'incidentId' => $this->incidentId ?? null,
            'incidentType' => $this->incidentType ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'incidentMessageLike' => $this->incidentMessageLike ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeProcessDefinitionsWithoutTenantId' => $this->includeProcessDefinitionsWithoutTenantId ?? null,
            'versionTag' => $this->versionTag ?? null,
            'versionTagLike' => $this->versionTagLike ?? null,
            'withoutVersionTag' => $this->withoutVersionTag ?? null,
            'startableInTasklist' => $this->startableInTasklist ?? null,
            'notStartableInTasklist' => $this->notStartableInTasklist ?? null,
            'startablePermissionCheck' => $this->startablePermissionCheck ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
