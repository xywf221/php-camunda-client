<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class VariableQueryParameterDto extends ConditionQueryParameterDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Variable name
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
