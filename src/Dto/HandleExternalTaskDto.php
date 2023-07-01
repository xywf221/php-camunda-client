<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HandleExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory.** The ID of the worker who is performing the operation on the external task.
     * If the task is already locked, must match the id of the worker who has most recently
     * locked the task.
     */
    public string $workerId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'workerId' => $this->workerId ?? null,
        ];
    }

}
