<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricDecisionInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by decision instance id.
     */
    public ?string $decisionInstanceId;

    /**
     * @var string|null Filter by decision instance ids. Must be a comma-separated list of decision instance ids.
     */
    public ?string $decisionInstanceIdIn;

    /**
     * @var string|null Filter by the decision definition the instances belongs to.
     */
    public ?string $decisionDefinitionId;

    /**
     * @var string|null Filter by the decision definitions the instances belongs to. Must be a
     * comma-separated list of decision definition ids.
     */
    public ?string $decisionDefinitionIdIn;

    /**
     * @var string|null Filter by the key of the decision definition the instances belongs to.
     */
    public ?string $decisionDefinitionKey;

    /**
     * @var string|null Filter by the keys of the decision definition the instances belongs to. Must be a comma-
     * separated list of decision definition keys.
     */
    public ?string $decisionDefinitionKeyIn;

    /**
     * @var string|null Filter by the name of the decision definition the instances belongs to.
     */
    public ?string $decisionDefinitionName;

    /**
     * @var string|null Filter by the name of the decision definition the instances belongs to, that the parameter
     * is a substring of.
     */
    public ?string $decisionDefinitionNameLike;

    /**
     * @var string|null Filter by the process definition the instances belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the instances belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Filter by the process instance the instances belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by the case definition the instances belongs to.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null Filter by the key of the case definition the instances belongs to.
     */
    public ?string $caseDefinitionKey;

    /**
     * @var string|null Filter by the case instance the instances belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by the activity ids the instances belongs to.
     * Must be a comma-separated list of acitvity ids.
     */
    public ?string $activityIdIn;

    /**
     * @var string|null Filter by the activity instance ids the instances belongs to.
     * Must be a comma-separated list of acitvity instance ids.
     */
    public ?string $activityInstanceIdIn;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A historic decision instance must have one
     * of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic decision instances that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Restrict to instances that were evaluated before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-
     * dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $evaluatedBefore;

    /**
     * @var string|null Restrict to instances that were evaluated after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-
     * dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $evaluatedAfter;

    /**
     * @var string|null Restrict to instances that were evaluated by the given user.
     */
    public ?string $userId;

    /**
     * @var string|null Restrict to instances that have a given root decision instance id.
     * This also includes the decision instance with the given id.
     */
    public ?string $rootDecisionInstanceId;

    /**
     * @var bool|null Restrict to instances those are the root decision instance of an evaluation.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $rootDecisionInstancesOnly;

    /**
     * @var string|null Filter by the decision requirements definition the instances belongs to.
     */
    public ?string $decisionRequirementsDefinitionId;

    /**
     * @var string|null Filter by the key of the decision requirements definition the instances belongs to.
     */
    public ?string $decisionRequirementsDefinitionKey;

    /**
     * @var bool|null Include input values in the result.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeInputs;

    /**
     * @var bool|null Include output values in the result.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeOutputs;

    /**
     * @var bool|null Disables fetching of byte array input and output values.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $disableBinaryFetching;

    /**
     * @var bool|null Disables deserialization of input and output values that are custom objects.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $disableCustomObjectDeserialization;

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
            'decisionInstanceId' => $this->decisionInstanceId ?? null,
            'decisionInstanceIdIn' => $this->decisionInstanceIdIn ?? null,
            'decisionDefinitionId' => $this->decisionDefinitionId ?? null,
            'decisionDefinitionIdIn' => $this->decisionDefinitionIdIn ?? null,
            'decisionDefinitionKey' => $this->decisionDefinitionKey ?? null,
            'decisionDefinitionKeyIn' => $this->decisionDefinitionKeyIn ?? null,
            'decisionDefinitionName' => $this->decisionDefinitionName ?? null,
            'decisionDefinitionNameLike' => $this->decisionDefinitionNameLike ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'evaluatedBefore' => $this->evaluatedBefore ?? null,
            'evaluatedAfter' => $this->evaluatedAfter ?? null,
            'userId' => $this->userId ?? null,
            'rootDecisionInstanceId' => $this->rootDecisionInstanceId ?? null,
            'rootDecisionInstancesOnly' => $this->rootDecisionInstancesOnly ?? null,
            'decisionRequirementsDefinitionId' => $this->decisionRequirementsDefinitionId ?? null,
            'decisionRequirementsDefinitionKey' => $this->decisionRequirementsDefinitionKey ?? null,
            'includeInputs' => $this->includeInputs ?? null,
            'includeOutputs' => $this->includeOutputs ?? null,
            'disableBinaryFetching' => $this->disableBinaryFetching ?? null,
            'disableCustomObjectDeserialization' => $this->disableCustomObjectDeserialization ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
