<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class LockExternalTaskDto extends HandleExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int The duration to lock the external task for in milliseconds.
     **Note:** Attempting to lock an already locked external task with the same `workerId`
     * will succeed and a new lock duration will be set, starting from the current moment.
     */
    public int $lockDuration;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'lockDuration' => $this->lockDuration ?? null,
        ];
    }

}
