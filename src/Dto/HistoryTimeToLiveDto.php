<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoryTimeToLiveDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null New value for historyTimeToLive field of the definition.
     * Can be `null`. Can not be negative.
     */
    public ?int $historyTimeToLive;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'historyTimeToLive' => $this->historyTimeToLive ?? null,
        ];
    }

}
