<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ResourceOptionsDto extends LinkableDto implements JsonSerializable, RequestPropertiesInterface
{


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
        ];
    }

}
