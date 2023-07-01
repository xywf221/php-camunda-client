<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetJobRetriesByProcessDto extends SetJobRetriesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of process instance ids to fetch jobs, for which retries will be set.
     */
    public ?array $processInstances;

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
            'processInstances' => $this->processInstances ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
        ];
    }

}
