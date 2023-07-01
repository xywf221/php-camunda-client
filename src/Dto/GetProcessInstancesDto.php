<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetProcessInstancesDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var string|null Filter by a comma-separated list of process instance ids.
     */
    public ?string $processInstanceIds;

    /**
     * @var string|null Filter by process instance business key.
     */
    public ?string $businessKey;

    /**
     * @var string|null Filter by process instance business key that the parameter is a substring of.
     */
    public ?string $businessKeyLike;

    /**
     * @var string|null Filter by case instance id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by the deployment the id belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the instances run on.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Filter by a comma-separated list of process definition keys.
     * A process instance must have one of the given process definition keys.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Exclude instances by a comma-separated list of process definition keys.
     * A process instance must not have one of the given process definition keys.
     */
    public ?string $processDefinitionKeyNotIn;

    /**
     * @var string|null Filter by the deployment the id belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Restrict query to all process instances that are sub process instances of the given process instance.
     * Takes a process instance id.
     */
    public ?string $superProcessInstance;

    /**
     * @var string|null Restrict query to all process instances that have the given process instance as a sub process instance.
     * Takes a process instance id.
     */
    public ?string $subProcessInstance;

    /**
     * @var string|null Restrict query to all process instances that are sub process instances of the given case instance.
     * Takes a case instance id.
     */
    public ?string $superCaseInstance;

    /**
     * @var string|null Restrict query to all process instances that have the given case instance as a sub case instance.
     * Takes a case instance id.
     */
    public ?string $subCaseInstance;

    /**
     * @var bool|null Only include active process instances. Value may only be true,
     * as false is the default behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended process instances. Value may only be true,
     * as false is the default behavior.
     */
    public ?bool $suspended;

    /**
     * @var bool|null Filter by presence of incidents. Selects only process instances that have an incident.
     */
    public ?bool $withIncident;

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
     * @var string|null Filter by a comma-separated list of tenant ids. A process instance must have one of the given tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include process instances which belong to no tenant.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Only include process instances which process definition has no tenant id.
     */
    public ?bool $processDefinitionWithoutTenantId;

    /**
     * @var string|null Filter by a comma-separated list of activity ids.
     * A process instance must currently wait in a leaf activity with one of the given activity ids.
     */
    public ?string $activityIdIn;

    /**
     * @var bool|null Restrict the query to all process instances that are top level process instances.
     */
    public ?bool $rootProcessInstances;

    /**
     * @var bool|null Restrict the query to all process instances that are leaf instances. (i.e. don't have any sub instances).
     */
    public ?bool $leafProcessInstances;

    /**
     * @var string|null Only include process instances that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     *
     * A valid parameter value has the form `key_operator_value`. `key` is the variable name,
     * `operator` is the comparison operator to be used and `value` the variable value.
     **Note**: Values are always treated as String objects on server side.
     *
     * Valid `operator` values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $variables;

    /**
     * @var bool|null Match all variable names in this query case-insensitively.
     * If set to true variableName and variablename are treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match all variable values in this query case-insensitively.
     * If set to true variableValue and variablevalue are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;


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
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'businessKey' => $this->businessKey ?? null,
            'businessKeyLike' => $this->businessKeyLike ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processDefinitionKeyNotIn' => $this->processDefinitionKeyNotIn ?? null,
            'deploymentId' => $this->deploymentId ?? null,
            'superProcessInstance' => $this->superProcessInstance ?? null,
            'subProcessInstance' => $this->subProcessInstance ?? null,
            'superCaseInstance' => $this->superCaseInstance ?? null,
            'subCaseInstance' => $this->subCaseInstance ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'withIncident' => $this->withIncident ?? null,
            'incidentId' => $this->incidentId ?? null,
            'incidentType' => $this->incidentType ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'incidentMessageLike' => $this->incidentMessageLike ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'processDefinitionWithoutTenantId' => $this->processDefinitionWithoutTenantId ?? null,
            'activityIdIn' => $this->activityIdIn ?? null,
            'rootProcessInstances' => $this->rootProcessInstances ?? null,
            'leafProcessInstances' => $this->leafProcessInstances ?? null,
            'variables' => $this->variables ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
        ];
    }

}
