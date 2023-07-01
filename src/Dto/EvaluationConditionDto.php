<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class EvaluationConditionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A map of variables which are used for evaluation of the conditions and are injected into the process instances which have been triggered.
     * Each key is a variable name and each value a JSON variable value object with the following properties.
     */
    public ?object $variables;

    /**
     * @var string|null Used for the process instances that have been triggered after the evaluation.
     */
    public ?string $businessKey;

    /**
     * @var string|null Used to evaluate a condition for a tenant with the given id.
     * Will only evaluate conditions of process definitions which belong to the tenant.
     */
    public ?string $tenantId;

    /**
     * @var bool|null A Boolean value that indicates whether the conditions should only be evaluated of process definitions which belong to no tenant or not.
     * Value may only be true, as false is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Used to evaluate conditions of the process definition with the given id.
     */
    public ?string $processDefinitionId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variables' => $this->variables ?? null,
            'businessKey' => $this->businessKey ?? null,
            'tenantId' => $this->tenantId ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
        ];
    }

}
