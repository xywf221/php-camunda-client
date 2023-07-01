<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CompleteExternalTaskDto extends HandleExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON object containing variable key-value pairs. Each key is a variable name and each value a JSON variable value object with the following properties:
     */
    public ?object $variables;

    /**
     * @var object|null A JSON object containing local variable key-value pairs. Local variables are set only in the scope of external task. Each key is a variable name and each value a JSON variable value object with the following properties:
     */
    public ?object $localVariables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variables' => $this->variables ?? null,
            'localVariables' => $this->localVariables ?? null,
        ];
    }

}
