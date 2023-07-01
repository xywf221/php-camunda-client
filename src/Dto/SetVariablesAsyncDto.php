<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetVariablesAsyncDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of process instance ids that define a group of process instances
     * to which the operation will set variables.
     *
     * Please note that if `processInstanceIds`, `processInstanceQuery` and `historicProcessInstanceQuery`
     * are defined, the resulting operation will be performed on the union of these sets.
     */
    public ?array $processInstanceIds;

    /**
     * @var ProcessInstanceQueryDto
     */
    public ProcessInstanceQueryDto $processInstanceQuery;

    /**
     * @var HistoricProcessInstanceQueryDto
     */
    public HistoricProcessInstanceQueryDto $historicProcessInstanceQuery;

    /**
     * @var object|null A variables the operation will set in the root scope of the process instances.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
