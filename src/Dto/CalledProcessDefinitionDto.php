<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CalledProcessDefinitionDto extends ProcessDefinitionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null Ids of the CallActivities which call this process.
     */
    public ?array $calledFromActivityIds;

    /**
     * @var string|null The id of the calling process definition
     */
    public ?string $callingProcessDefinitionId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'calledFromActivityIds' => $this->calledFromActivityIds ?? null,
            'callingProcessDefinitionId' => $this->callingProcessDefinitionId ?? null,
        ];
    }

}
