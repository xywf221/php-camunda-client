<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricProcessInstancesCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by process instance ids. Filter by a comma-separated list of `Strings`.
     */
    public ?string $processInstanceIds;

    /**
     * @var string|null Filter by the process definition the instances run on.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the instances run on.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Filter by a list of process definition keys. A process instance must have one of the given process definition keys. Filter by a comma-separated list of `Strings`.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Filter by the name of the process definition the instances run on.
     */
    public ?string $processDefinitionName;

    /**
     * @var string|null Filter by process definition names that the parameter is a substring of.
     */
    public ?string $processDefinitionNameLike;

    /**
     * @var string|null Exclude instances that belong to a set of process definitions. Filter by a comma-separated list of `Strings`.
     */
    public ?string $processDefinitionKeyNotIn;

    /**
     * @var string|null Filter by process instance business key.
     */
    public ?string $processInstanceBusinessKey;

    /**
     * @var string|null Filter by a list of business keys. A process instance must have one of the given business keys. Filter by a comma-separated list of `Strings`
     */
    public ?string $processInstanceBusinessKeyIn;

    /**
     * @var string|null Filter by process instance business key that the parameter is a substring of.
     */
    public ?string $processInstanceBusinessKeyLike;

    /**
     * @var bool|null Restrict the query to all process instances that are top level process instances.
     */
    public ?bool $rootProcessInstances;

    /**
     * @var bool|null Only include finished process instances. This flag includes all process instances
     * that are completed or terminated. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $finished;

    /**
     * @var bool|null Only include unfinished process instances. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $unfinished;

    /**
     * @var bool|null Only include process instances which have an incident. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withIncidents;

    /**
     * @var bool|null Only include process instances which have a root incident. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withRootIncidents;

    /**
     * @var string|null Filter by the incident type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
     */
    public ?string $incidentType;

    /**
     * @var string|null Only include process instances which have an incident in status either open or resolved. To get all process instances, use the query parameter withIncidents.
     */
    public ?string $incidentStatus;

    /**
     * @var string|null Filter by the incident message. Exact match.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null Filter by the incident message that the parameter is a substring of.
     */
    public ?string $incidentMessageLike;

    /**
     * @var string|null Restrict to instances that were started before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Restrict to instances that were started after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;

    /**
     * @var string|null Restrict to instances that were finished before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedBefore;

    /**
     * @var string|null Restrict to instances that were finished after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedAfter;

    /**
     * @var string|null Restrict to instances that executed an activity after the given date (inclusive).
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executedActivityAfter;

    /**
     * @var string|null Restrict to instances that executed an activity before the given date (inclusive).
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executedActivityBefore;

    /**
     * @var string|null Restrict to instances that executed an job after the given date (inclusive).
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executedJobAfter;

    /**
     * @var string|null Restrict to instances that executed an job before the given date (inclusive).
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executedJobBefore;

    /**
     * @var string|null Only include process instances that were started by the given user.
     */
    public ?string $startedBy;

    /**
     * @var string|null Restrict query to all process instances that are sub process instances of the given process instance. Takes a process instance id.
     */
    public ?string $superProcessInstanceId;

    /**
     * @var string|null Restrict query to one process instance that has a sub process instance with the given id.
     */
    public ?string $subProcessInstanceId;

    /**
     * @var string|null Restrict query to all process instances that are sub process instances of the given case instance. Takes a case instance id.
     */
    public ?string $superCaseInstanceId;

    /**
     * @var string|null Restrict query to one process instance that has a sub case instance with the given id.
     */
    public ?string $subCaseInstanceId;

    /**
     * @var string|null Restrict query to all process instances that are sub process instances of the given case instance. Takes a case instance id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by a list of tenant ids. A process instance must have one of the given tenant ids. Filter by a comma-separated list of `Strings`
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic process instances which belong to no tenant. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Restrict to instances that executed an activity with one of given ids. Filter by a comma-separated list of `Strings`
     */
    public ?string $executedActivityIdIn;

    /**
     * @var string|null Restrict to instances that have an active activity with one of given ids. Filter by a comma-separated list of `Strings`
     */
    public ?string $activeActivityIdIn;

    /**
     * @var bool|null Restrict to instances that are active.
     */
    public ?bool $active;

    /**
     * @var bool|null Restrict to instances that are suspended.
     */
    public ?bool $suspended;

    /**
     * @var bool|null Restrict to instances that are completed.
     */
    public ?bool $completed;

    /**
     * @var bool|null Restrict to instances that are externallyTerminated.
     */
    public ?bool $externallyTerminated;

    /**
     * @var bool|null Restrict to instances that are internallyTerminated.
     */
    public ?bool $internallyTerminated;

    /**
     * @var string|null Only include process instances that have/had variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as follows:
     * A valid parameter value has the form `key_operator_value`. `key` is the variable name, `operator` is the comparison operator to be used and `value` the variable value.
     **Note:** Values are always treated as String objects on server side.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to; `gt` - greater than; `gteq` - greater than or equal to; `lt` - lower than; `lteq` - lower than or equal to; `like`.
     *
     * Key and value may not contain underscore or comma characters.
     */
    public ?string $variables;

    /**
     * @var bool|null Match all variable names provided in variables case-insensitively. If set to `true` variableName and variablename are treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match all variable values provided in variables case-insensitively. If set to `true` variableValue and variablevalue are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'processDefinitionNameLike' => $this->processDefinitionNameLike ?? null,
            'processDefinitionKeyNotIn' => $this->processDefinitionKeyNotIn ?? null,
            'processInstanceBusinessKey' => $this->processInstanceBusinessKey ?? null,
            'processInstanceBusinessKeyIn' => $this->processInstanceBusinessKeyIn ?? null,
            'processInstanceBusinessKeyLike' => $this->processInstanceBusinessKeyLike ?? null,
            'rootProcessInstances' => $this->rootProcessInstances ?? null,
            'finished' => $this->finished ?? null,
            'unfinished' => $this->unfinished ?? null,
            'withIncidents' => $this->withIncidents ?? null,
            'withRootIncidents' => $this->withRootIncidents ?? null,
            'incidentType' => $this->incidentType ?? null,
            'incidentStatus' => $this->incidentStatus ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'incidentMessageLike' => $this->incidentMessageLike ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
            'finishedBefore' => $this->finishedBefore ?? null,
            'finishedAfter' => $this->finishedAfter ?? null,
            'executedActivityAfter' => $this->executedActivityAfter ?? null,
            'executedActivityBefore' => $this->executedActivityBefore ?? null,
            'executedJobAfter' => $this->executedJobAfter ?? null,
            'executedJobBefore' => $this->executedJobBefore ?? null,
            'startedBy' => $this->startedBy ?? null,
            'superProcessInstanceId' => $this->superProcessInstanceId ?? null,
            'subProcessInstanceId' => $this->subProcessInstanceId ?? null,
            'superCaseInstanceId' => $this->superCaseInstanceId ?? null,
            'subCaseInstanceId' => $this->subCaseInstanceId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'executedActivityIdIn' => $this->executedActivityIdIn ?? null,
            'activeActivityIdIn' => $this->activeActivityIdIn ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'completed' => $this->completed ?? null,
            'externallyTerminated' => $this->externallyTerminated ?? null,
            'internallyTerminated' => $this->internallyTerminated ?? null,
            'variables' => $this->variables ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
        ];
    }

}
