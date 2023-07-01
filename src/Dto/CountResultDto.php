<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CountResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int The number of matching instances.
     */
    public int $count;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'count' => $this->count ?? null,
        ];
    }

}
