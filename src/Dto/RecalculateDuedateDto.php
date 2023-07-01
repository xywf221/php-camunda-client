<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class RecalculateDuedateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Recalculate the due date based on the creation date of the job or the current date.
     * Value may only be `false`, as `true` is the default behavior.
     */
    public ?bool $creationDateBased;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'creationDateBased' => $this->creationDateBased ?? null,
        ];
    }

}
