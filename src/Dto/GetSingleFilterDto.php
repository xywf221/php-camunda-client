<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetSingleFilterDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null If set to `true`, each filter result will contain an `itemCount`
     * property with the number of items matched by the filter itself.
     */
    public ?bool $itemCount;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'itemCount' => $this->itemCount ?? null,
        ];
    }

}
