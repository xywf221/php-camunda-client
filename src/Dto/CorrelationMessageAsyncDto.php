<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CorrelationMessageAsyncDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the message to correlate. Corresponds to the 'name' element of the message defined in BPMN 2.0 XML. Can be null to correlate by other criteria only.
     */
    public ?string $messageName;

    /**
     * @var array<string>|null A list of process instance ids that define a group of process instances
     * to which the operation will correlate a message.
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
     * @var object|null All variables the operation will set in the root scope of the process instances the message is correlated to.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'messageName' => $this->messageName ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
