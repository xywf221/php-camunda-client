<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExtendLockOnExternalTaskDto extends HandleExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null An amount of time (in milliseconds). This is the new lock duration starting from the
     * current moment.
     */
    public ?int $newDuration;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'newDuration' => $this->newDuration ?? null,
        ];
    }

}
