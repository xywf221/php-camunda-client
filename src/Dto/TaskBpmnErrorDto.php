<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TaskBpmnErrorDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An error code that indicates the predefined error. It is used to identify the BPMN
     * error handler.
     */
    public ?string $errorCode;

    /**
     * @var string|null An error message that describes the error.
     */
    public ?string $errorMessage;

    /**
     * @var object|null A JSON object containing variable key-value pairs.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'errorCode' => $this->errorCode ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
