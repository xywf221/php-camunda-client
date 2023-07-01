<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class PriorityDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The priority of the resource.
     */
    public ?int $priority;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'priority' => $this->priority ?? null,
        ];
    }

}
