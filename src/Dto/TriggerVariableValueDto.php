<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TriggerVariableValueDto extends VariableValueDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Indicates whether the variable should be a local variable or not.
     * If set to true, the variable becomes a local variable of the execution
     * entering the target activity.
     */
    public ?bool $local;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'local' => $this->local ?? null,
        ];
    }

}
