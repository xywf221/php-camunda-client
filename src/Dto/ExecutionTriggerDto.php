<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExecutionTriggerDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON object containing variable key-value pairs. Each key is a variable name and
     * each value a JSON variable value object.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variables' => $this->variables ?? null,
        ];
    }

}
