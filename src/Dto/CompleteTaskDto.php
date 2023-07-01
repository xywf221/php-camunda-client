<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CompleteTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON object containing variable key-value pairs.
     */
    public ?object $variables;

    /**
     * @var bool|null Indicates whether the response should contain the process variables or not. The
     * default is `false` with a response code of `204`. If set to `true` the response
     * contains the process variables and has a response code of `200`. If the task is not
     * associated with a process instance (e.g. if it's part of a case instance) no
     * variables will be returned.
     */
    public ?bool $withVariablesInReturn = false;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variables' => $this->variables ?? null,
            'withVariablesInReturn' => $this->withVariablesInReturn ?? null,
        ];
    }

}
