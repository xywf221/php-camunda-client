<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetRetriesForExternalTasksDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The number of retries to set for the external task.  Must be >= 0. If this is 0, an incident is created
     * and the task cannot be fetched anymore unless the retries are increased again. Can not be null.
     */
    public ?int $retries;

    /**
     * @var array<string>|null The ids of the external tasks to set the number of retries for.
     */
    public ?array $externalTaskIds;

    /**
     * @var array<string>|null The ids of process instances containing the tasks to set the number of retries for.
     */
    public ?array $processInstanceIds;

    /**
     * @var ExternalTaskQueryDto
     */
    public ExternalTaskQueryDto $externalTaskQuery;

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
            'retries' => $this->retries ?? null,
            'externalTaskIds' => $this->externalTaskIds ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'externalTaskQuery' => $this->externalTaskQuery ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
        ];
    }

}
