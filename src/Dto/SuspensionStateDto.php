<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null A Boolean value which indicates whether to activate or suspend a given instance
     * (e.g. process instance, job, job definition, or batch). When the value is set to true,
     * the given instance will be suspended and when the value is set to false,
     * the given instance will be activated.
     */
    public ?bool $suspended;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'suspended' => $this->suspended ?? null,
        ];
    }

}
