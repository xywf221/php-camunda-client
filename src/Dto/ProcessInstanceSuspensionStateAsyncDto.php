<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceSuspensionStateAsyncDto extends SuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of process instance ids which defines a group of process instances
     * which will be activated or suspended by the operation.
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
        ];
    }

}
