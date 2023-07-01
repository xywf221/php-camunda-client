<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MessageCorrelationResultWithVariableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Indicates if the message was correlated to a message start event or an
     * intermediate message catching event. In the first case, the resultType is
     * `ProcessDefinition` and otherwise `Execution`.
     */
    public ?string $resultType;

    /**
     * @var ProcessInstanceDto
     */
    public ProcessInstanceDto $processInstance;

    /**
     * @var ExecutionDto
     */
    public ExecutionDto $execution;

    /**
     * @var object|null This property is returned if the `variablesInResultEnabled` is set to `true`.
     * Contains a list of the process variables.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'resultType' => $this->resultType ?? null,
            'processInstance' => $this->processInstance ?? null,
            'execution' => $this->execution ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
