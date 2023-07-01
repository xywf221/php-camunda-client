<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class RetriesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The number of retries to set for the resource.  Must be >= 0. If this is 0, an incident is created
     * and the task, or job, cannot be fetched, or acquired anymore unless the retries are increased again.
     * Can not be null.
     */
    public ?int $retries;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'retries' => $this->retries ?? null,
        ];
    }

}
