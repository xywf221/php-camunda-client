<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class VariableInstanceQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by variable instance name.
     */
    public ?string $variableName;

    /**
     * @var string|null Filter by the variable instance name. The parameter can include the wildcard `%` to
     * express like-strategy such as: starts with (`%`name), ends with (name`%`) or
     * contains (`%`name`%`).
     */
    public ?string $variableNameLike;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed
     * process instance ids.
     */
    public ?array $processInstanceIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed
     * execution ids.
     */
    public ?array $executionIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed  case instance ids.
     */
    public ?array $caseInstanceIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed  case execution ids.
     */
    public ?array $caseExecutionIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed  task
     * ids.
     */
    public ?array $taskIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed
     * batch ids.
     */
    public ?array $batchIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed
     * activity instance ids.
     */
    public ?array $activityInstanceIdIn;

    /**
     * @var array<string>|null Only include variable instances which belong to one of the passed
     * tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var array<VariableQueryParameterDto>|null An array to only include variable instances that have the certain values.
     * The array consists of objects with the three properties `name`, `operator` and `value`. `name (String)` is the
     * variable name, `operator (String)` is the comparison operator to be used and `value` the variable value.
     * `value` may be `String`, `Number` or `Boolean`.
     *
     * Valid operator values are: `eq` - equal to; `neq` - not equal to; `gt` - greater than; `gteq` - greater
     * than or equal to; `lt` - lower than; `lteq` - lower than or equal to; `like`
     */
    public ?array $variableValues;

    /**
     * @var bool|null Match all variable names provided in `variableValues` case-insensitively. If set to `true`
     **variableName** and **variablename** are treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match all variable values provided in `variableValues` case-insensitively. If set to
     * `true` **variableValue** and **variablevalue** are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

    /**
     * @var array<string>|null Only include variable instances which belong to one of passed scope ids.
     */
    public ?array $variableScopeIdIn;

    /**
     * @var array<object>|null An array of criteria to sort the result by. Each element of the array is an object that specifies one ordering.
     * The position in the array identifies the rank of an ordering, i.e., whether it is primary, secondary, etc.
     * Sorting has no effect for `count` endpoints
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
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'executionIdIn' => $this->executionIdIn ?? null,
            'caseInstanceIdIn' => $this->caseInstanceIdIn ?? null,
            'caseExecutionIdIn' => $this->caseExecutionIdIn ?? null,
            'taskIdIn' => $this->taskIdIn ?? null,
            'batchIdIn' => $this->batchIdIn ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'variableValues' => $this->variableValues ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'variableScopeIdIn' => $this->variableScopeIdIn ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
