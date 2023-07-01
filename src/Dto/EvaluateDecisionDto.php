<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class EvaluateDecisionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null
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
