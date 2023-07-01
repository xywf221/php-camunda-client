<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class RestartProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of process instance ids to restart.
     */
    public ?array $processInstanceIds;

    /**
     * @var HistoricProcessInstanceQueryDto
     */
    public HistoricProcessInstanceQueryDto $historicProcessInstanceQuery;

    /**
     * @var bool|null Skip execution listener invocation for activities that are started as part of this request.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null Skip execution of
     * [input/output variable mappings](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#input-output-variable-mapping)
     * for activities that are started as part of this request.
     */
    public ?bool $skipIoMappings;

    /**
     * @var bool|null Set the initial set of variables during restart. By default, the last set of variables is used.
     */
    public ?bool $initialVariables;

    /**
     * @var bool|null Do not take over the business key of the historic process instance.
     */
    public ?bool $withoutBusinessKey;

    /**
     * @var array<RestartProcessInstanceModificationInstructionDto>|null **Optional**. A JSON array of instructions that specify which activities to start the process instance at.
     * If this property is omitted, the process instance starts at its default blank start event.
     */
    public ?array $instructions;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
            'initialVariables' => $this->initialVariables ?? null,
            'withoutBusinessKey' => $this->withoutBusinessKey ?? null,
            'instructions' => $this->instructions ?? null,
        ];
    }

}
