<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobRetriesDto extends RetriesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The due date to set for the job. A due date indicates when this job is ready for execution.
     * Jobs with due dates in the past will be scheduled for execution.
     */
    public ?string $dueDate;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'dueDate' => $this->dueDate ?? null,
        ];
    }

}
