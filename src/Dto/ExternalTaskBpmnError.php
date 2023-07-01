<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExternalTaskBpmnError extends TaskBpmnErrorDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the worker that reports the failure. Must match the id of the worker who has most recently
     * locked the task.
     */
    public ?string $workerId;


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
