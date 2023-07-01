<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteHistoricProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null If set to `false`, the request will still be successful if the process id is not found.
     */
    public ?bool $failIfNotExists;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'failIfNotExists' => $this->failIfNotExists ?? null,
        ];
    }

}
