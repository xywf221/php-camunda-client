<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the deployment the id belongs to.
     */
    public ?string $deploymentId;

    /**
     * @var string|null Filter by the process definition the instances run on.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the instances run on.
     */
    public ?string $processDefinitionKey;

    /**
     * @var array<string>|null Filter by a list of process definition keys.
     * A process instance must have one of the given process definition keys. Must be a JSON array of Strings.
     */
    public ?array $processDefinitionKeyIn;

    /**
     * @var array<string>|null Exclude instances by a list of process definition keys.
     * A process instance must not have one of the given process definition keys. Must be a JSON array of Strings.
     */
    public ?array $processDefinitionKeyNotIn;

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
     * @var bool|null Only include active process instances. Value may only be true, as false is the default behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended process instances. Value may only be true, as false is the default behavior.
     */
    public ?bool $suspended;

    /**
     * @var array<string>|null Filter by a list of process instance ids. Must be a JSON array of Strings.
     */
    public ?array $processInstanceIds;

    /**
     * @var bool|null Filter by presence of incidents. Selects only process instances that have an incident.
     */
    public ?bool $withIncident;

    /**
     * @var string|null Filter by the incident id.
     */
    public ?string $incidentId;

    /**
     * @var string|null Filter by the incident type. See the User Guide for a list of incident types.
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
     * @var array<string>|null Filter by a list of tenant ids. A process instance must have one of the given tenant ids.
     * Must be a JSON array of Strings.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include process instances which belong to no tenant.
     * Value may only be true, as false is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Only include process instances which process definition has no tenant id.
     */
    public ?bool $processDefinitionWithoutTenantId;

    /**
     * @var array<string>|null Filter by a list of activity ids.
     * A process instance must currently wait in a leaf activity with one of the given activity ids.
     */
    public ?array $activityIdIn;

    /**
     * @var bool|null Restrict the query to all process instances that are top level process instances.
     */
    public ?bool $rootProcessInstances;

    /**
     * @var bool|null Restrict the query to all process instances that are leaf instances. (i.e. don't have any sub instances)
     */
    public ?bool $leafProcessInstances;

    /**
     * @var array<VariableQueryParameterDto>|null A JSON array to only include process instances that have variables with certain values.
     * The array consists of objects with the three properties `name`, `operator` and `value`.
     * `name` (String) is the variable name,
     * `operator` (String) is the comparison operator to be used and `value` the variable value.
     * The `value` may be String, Number or Boolean.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to; `gt` - greater than;
     * `gteq` - greater than or equal to; `lt` - lower than; `lteq` - lower than or equal to; `like`.
     */
    public ?array $variables;

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

    /**
     * @var array<ProcessInstanceQueryDto>|null A JSON array of nested process instance queries with OR semantics.
     * A process instance matches a nested query if it fulfills at least one of the query's predicates.
     * With multiple nested queries, a process instance must fulfill at least one predicate of each query (Conjunctive Normal Form).
     * All process instance query properties can be used except for: `sorting`
     * See the [User guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-engine-api/#or-queries) for more information about OR queries.
     */
    public ?array $orQueries;

    /**
     * @var array<object>|null Apply sorting of the result
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'deploymentId' => $this->deploymentId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processDefinitionKeyNotIn' => $this->processDefinitionKeyNotIn ?? null,
            'businessKey' => $this->businessKey ?? null,
            'businessKeyLike' => $this->businessKeyLike ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'superProcessInstance' => $this->superProcessInstance ?? null,
            'subProcessInstance' => $this->subProcessInstance ?? null,
            'superCaseInstance' => $this->superCaseInstance ?? null,
            'subCaseInstance' => $this->subCaseInstance ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
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
            'orQueries' => $this->orQueries ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
