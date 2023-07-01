<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteTaskMetricsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The date prior to which all task worker metrics should be deleted.
     */
    public ?string $date;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'date' => $this->date ?? null,
        ];
    }

}
