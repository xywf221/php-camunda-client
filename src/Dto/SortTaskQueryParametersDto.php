<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SortTaskQueryParametersDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the variable to sort by.
     */
    public ?string $variable;

    /**
     * @var string|null The name of the type of the variable value.
     */
    public ?string $type;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variable' => $this->variable ?? null,
            'type' => $this->type ?? null,
        ];
    }

}
