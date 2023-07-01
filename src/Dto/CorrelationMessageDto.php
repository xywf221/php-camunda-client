<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CorrelationMessageDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the message to deliver.
     */
    public ?string $messageName;

    /**
     * @var string|null Used for correlation of process instances that wait for incoming messages.
     * Will only correlate to executions that belong to a process instance with the provided business key.
     */
    public ?string $businessKey;

    /**
     * @var string|null Used to correlate the message for a tenant with the given id.
     * Will only correlate to executions and process definitions which belong to the tenant.
     * Must not be supplied in conjunction with a `withoutTenantId`.
     */
    public ?string $tenantId;

    /**
     * @var bool|null A Boolean value that indicates whether the message should only be correlated to executions
     * and process definitions which belong to no tenant or not. Value may only be `true`, as `false`
     * is the default behavior.
     * Must not be supplied in conjunction with a `tenantId`.
     */
    public ?bool $withoutTenantId = false;

    /**
     * @var string|null Used to correlate the message to the process instance with the given id.
     */
    public ?string $processInstanceId;

    /**
     * @var object|null Used for correlation of process instances that wait for incoming messages.
     * Has to be a JSON object containing key-value pairs that are matched against process instance variables
     * during correlation. Each key is a variable name and each value a JSON variable value object with the
     * following properties.
     */
    public ?object $correlationKeys;

    /**
     * @var object|null Local variables used for correlation of executions (process instances) that wait for incoming messages.
     * Has to be a JSON object containing key-value pairs that are matched against local variables during correlation.
     * Each key is a variable name and each value a JSON variable value object with the following properties.
     */
    public ?object $localCorrelationKeys;

    /**
     * @var object|null A map of variables that is injected into the triggered execution or process instance after the message
     * has been delivered. Each key is a variable name and each value a JSON variable value object with
     * the following properties.
     */
    public ?object $processVariables;

    /**
     * @var object|null A map of local variables that is injected into the triggered execution or process instance after the
     * message has been delivered. Each key is a variable name and each value a JSON variable value object
     * with the following properties.
     */
    public ?object $processVariablesLocal;

    /**
     * @var bool|null A Boolean value that indicates whether the message should be correlated to exactly one entity or multiple entities.
     * If the value is set to `false`, the message will be correlated to exactly one entity (execution or process definition).
     * If the value is set to `true`, the message will be correlated to multiple executions and a process definition that
     * can be instantiated by this message in one go.
     */
    public ?bool $all = false;

    /**
     * @var bool|null A Boolean value that indicates whether the result of the correlation should be returned or not.
     * If this property is set to `true`, there will be returned a list of message correlation result objects. Depending on the
     * all property, there will be either one ore more returned results in the list.
     *
     * The default value is `false`, which means no result will be returned.
     */
    public ?bool $resultEnabled = false;

    /**
     * @var bool|null A Boolean value that indicates whether the result of the correlation should contain process variables or not.
     * The parameter resultEnabled should be set to `true` in order to use this it.
     *
     * The default value is `false`, which means the variables will not be returned.
     */
    public ?bool $variablesInResultEnabled = false;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'messageName' => $this->messageName ?? null,
            'businessKey' => $this->businessKey ?? null,
            'tenantId' => $this->tenantId ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'correlationKeys' => $this->correlationKeys ?? null,
            'localCorrelationKeys' => $this->localCorrelationKeys ?? null,
            'processVariables' => $this->processVariables ?? null,
            'processVariablesLocal' => $this->processVariablesLocal ?? null,
            'all' => $this->all ?? null,
            'resultEnabled' => $this->resultEnabled ?? null,
            'variablesInResultEnabled' => $this->variablesInResultEnabled ?? null,
        ];
    }

}
