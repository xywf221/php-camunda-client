<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class StartProcessInstanceFormDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null
     */
    public ?object $variables;

    /**
     * @var string|null The business key the process instance is to be initialized with.
     * The business key uniquely identifies the process instance in the context of the given process definition.
     */
    public ?string $businessKey;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'variables' => $this->variables ?? null,
            'businessKey' => $this->businessKey ?? null,
        ];
    }

}
