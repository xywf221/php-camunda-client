<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteHistoricProcessInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list historic process instance ids to delete.
     */
    public ?array $historicProcessInstanceIds;

    /**
     * @var HistoricProcessInstanceQueryDto
     */
    public HistoricProcessInstanceQueryDto $historicProcessInstanceQuery;

    /**
     * @var string|null A string with delete reason.
     */
    public ?string $deleteReason;

    /**
     * @var bool|null If set to `false`, the request will still be successful if one ore more of the process ids are not found.
     */
    public ?bool $failIfNotExists;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'historicProcessInstanceIds' => $this->historicProcessInstanceIds ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
            'deleteReason' => $this->deleteReason ?? null,
            'failIfNotExists' => $this->failIfNotExists ?? null,
        ];
    }

}
