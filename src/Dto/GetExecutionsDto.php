<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetExecutionsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by the business key of the process instances the executions belong to.
     */
    public ?string $businessKey;

    /**
     * @var string|null Filter by the process definition the executions run on.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by the key of the process definition the executions run on.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Filter by the id of the process instance the execution belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by the id of the activity the execution currently executes.
     */
    public ?string $activityId;

    /**
     * @var string|null Select only those executions that expect a signal of the given name.
     */
    public ?string $signalEventSubscriptionName;

    /**
     * @var string|null Select only those executions that expect a message of the given name.
     */
    public ?string $messageEventSubscriptionName;

    /**
     * @var bool|null Only include active executions. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $active;

    /**
     * @var bool|null Only include suspended executions. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $suspended;

    /**
     * @var string|null Filter by the incident id.
     */
    public ?string $incidentId;

    /**
     * @var string|null Filter by the incident type.
     * @link /manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
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
     * @var string|null Filter by a comma-separated list of tenant ids. An execution must have one of the given
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var string|null Only include executions that have variables with certain values.
     * Variable filtering expressions are comma-separated and are structured as
     * follows:
     *
     * A valid parameter value has the form `key_operator_value`.
     * `key` is the variable name, `operator` is the comparison operator to be used
     * and `value` the variable value.
     **Note:** Values are always treated as `String` objects on server side.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to; `gt` -
     * greater than;
     * `gteq` - greater than or equal to; `lt` - lower than; `lteq` - lower than or
     * equal to;
     * `like`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $variables;

    /**
     * @var string|null Only include executions that belong to a process instance with variables with certain
     * values.
     * Variable filtering expressions are comma-separated and are structured as
     * follows:
     *
     * A valid parameter value has the form `key_operator_value`.
     * `key` is the variable name, `operator` is the comparison operator to be used
     * and `value` the variable value.
     **Note:** Values are always treated as `String` objects on server side.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $processVariables;

    /**
     * @var bool|null Match all variable names provided in `variables` and `processVariables` case-
     * insensitively. If set to `true` **variableName** and **variablename** are
     * treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match all variable values provided in `variables` and `processVariables` case-
     * insensitively. If set to `true` **variableValue** and **variablevalue** are
     * treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

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
            'businessKey' => $this->businessKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'signalEventSubscriptionName' => $this->signalEventSubscriptionName ?? null,
            'messageEventSubscriptionName' => $this->messageEventSubscriptionName ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'incidentId' => $this->incidentId ?? null,
            'incidentType' => $this->incidentType ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'incidentMessageLike' => $this->incidentMessageLike ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'variables' => $this->variables ?? null,
            'processVariables' => $this->processVariables ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
