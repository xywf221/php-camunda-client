<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobConditionQueryParameterDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Comparison operator to be used.
     */
    public ?string $operator;

    /**
     * @var string|null Date value to compare with.
     */
    public ?string $value;


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
