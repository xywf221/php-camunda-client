<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TaskEscalationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An escalation code that indicates the predefined escalation. It is used to identify
     * the BPMN escalation handler.
     */
    public ?string $escalationCode;

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
            'escalationCode' => $this->escalationCode ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
