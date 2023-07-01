<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ConditionQueryParameterDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Comparison operator to be used. `notLike` is not supported by all endpoints.
     */
    public ?string $operator;

    /**
     * @var mixed
     */
    public $value;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'operator' => $this->operator ?? null,
            'value' => $this->value ?? null,
        ];
    }

}
