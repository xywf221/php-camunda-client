<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteBatchDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null `true`, if the historic batch and historic job logs for this batch should also be deleted.
     */
    public ?bool $cascade;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'cascade' => $this->cascade ?? null,
        ];
    }

}
