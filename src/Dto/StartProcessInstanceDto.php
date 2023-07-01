<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class StartProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The business key of the process instance.
     */
    public ?string $businessKey;

    /**
     * @var object|null
     */
    public ?object $variables;

    /**
     * @var string|null The case instance id the process instance is to be initialized with.
     */
    public ?string $caseInstanceId;

    /**
     * @var array<ProcessInstanceModificationInstructionDto>|null **Optional**. A JSON array of instructions that specify which activities to start the process instance at.
     * If this property is omitted, the process instance starts at its default blank start event.
     */
    public ?array $startInstructions;

    /**
     * @var bool|null Skip execution listener invocation for activities that are started or ended as part of this request.
     **Note**: This option is currently only respected when start instructions are submitted
     * via the `startInstructions` property.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null Skip execution of
     * [input/output variable mappings](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#input-output-variable-mapping)
     * for activities that are started or ended as part of this request.
     **Note**: This option is currently only respected when start instructions are submitted
     * via the `startInstructions` property.
     */
    public ?bool $skipIoMappings;

    /**
     * @var bool|null Indicates if the variables, which was used by the process instance during execution, should be returned.
     * Default value: `false`
     */
    public ?bool $withVariablesInReturn;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'businessKey' => $this->businessKey ?? null,
            'variables' => $this->variables ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'startInstructions' => $this->startInstructions ?? null,
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
            'withVariablesInReturn' => $this->withVariablesInReturn ?? null,
        ];
    }

}
