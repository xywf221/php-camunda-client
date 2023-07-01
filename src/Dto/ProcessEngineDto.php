<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessEngineDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the process engine.
     */
    public ?string $name;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'name' => $this->name ?? null,
        ];
    }

}
