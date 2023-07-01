<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetRemovalTimeToHistoricProcessInstancesDto extends AbstractSetRemovalTimeDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null The id of the process instance.
     */
    public ?array $historicProcessInstanceIds;

    /**
     * @var HistoricProcessInstanceQueryDto
     */
    public HistoricProcessInstanceQueryDto $historicProcessInstanceQuery;

    /**
     * @var bool|null Sets the removal time to all historic process instances in the hierarchy.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $hierarchical;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'historicProcessInstanceIds' => $this->historicProcessInstanceIds ?? null,
            'historicProcessInstanceQuery' => $this->historicProcessInstanceQuery ?? null,
            'hierarchical' => $this->hierarchical ?? null,
        ];
    }

}
