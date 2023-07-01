<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteProcessInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list process instance ids to delete.
     */
    public ?array $processInstanceIds;

    /**
     * @var string|null A string with delete reason.
     */
    public ?string $deleteReason;

    /**
     * @var bool|null Skip execution listener invocation for activities that are started or ended as part of this request.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null Skip deletion of the subprocesses related to deleted processes as part of this request.
     */
    public ?bool $skipSubprocesses;

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
            'deleteReason' => $this->deleteReason ?? null,
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipSubprocesses' => $this->skipSubprocesses ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
        ];
    }

}
