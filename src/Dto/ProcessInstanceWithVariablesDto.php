<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceWithVariablesDto extends ProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null The id of the process instance.
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
