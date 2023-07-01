<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricVariableInstanceQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by variable name.
     */
    public ?string $variableName;

    /**
     * @var string|null Restrict to variables with a name like the parameter.
     */
    public ?string $variableNameLike;

    /**
     * @var object Filter by variable value. May be `String`, `Number` or `Boolean`.
     */
    public object $variableValue;

    /**
     * @var bool|null Match the variable name provided in `variableName` and `variableNameLike` case-
     * insensitively. If set to `true` **variableName** and **variablename** are
     * treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match the variable value provided in `variableValue` case-insensitively. If set to `true`
     **variableValue** and **variablevalue** are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and comma-
     * separated variable types. A list of all supported variable types can be found
     * [here](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#supported-variable-values).
     **Note:** All non-primitive variables are associated with the type
     * 'serializable'.
     */
    public ?array $variableTypeIn;

    /**
     * @var bool|null Include variables that has already been deleted during the execution.
     */
    public ?bool $includeDeleted;

    /**
     * @var string|null Filter by the process instance the variable belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed  process instance ids.
     */
    public ?array $processInstanceIdIn;

    /**
     * @var string|null Filter by the process definition the variable belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Filter by a key of the process definition the variable belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and  execution ids.
     */
    public ?array $executionIdIn;

    /**
     * @var string|null Filter by the case instance the variable belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and  case execution ids.
     */
    public ?array $caseExecutionIdIn;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and  case activity ids.
     */
    public ?array $caseActivityIdIn;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and  task ids.
     */
    public ?array $taskIdIn;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and  activity instance ids.
     */
    public ?array $activityInstanceIdIn;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed and comma-
     * separated tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include historic variable instances that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var array<string>|null Only include historic variable instances which belong to one of the passed  variable names.
     */
    public ?array $variableNameIn;

    /**
     * @var array<object>|null An array of criteria to sort the result by. Each element of the array is
     * an object that specifies one ordering. The position in the array
     * identifies the rank of an ordering, i.e., whether it is primary, secondary,
     * etc. Sorting has no effect for `count` endpoints
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variableName' => $this->variableName ?? null,
            'variableNameLike' => $this->variableNameLike ?? null,
            'variableValue' => $this->variableValue ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'variableTypeIn' => $this->variableTypeIn ?? null,
            'includeDeleted' => $this->includeDeleted ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionIdIn' => $this->caseExecutionIdIn ?? null,
            'caseActivityIdIn' => $this->caseActivityIdIn ?? null,
            'taskIdIn' => $this->taskIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'variableNameIn' => $this->variableNameIn ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
