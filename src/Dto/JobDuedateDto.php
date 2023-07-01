<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDuedateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The date to set when the job has the next execution.
     */
    public ?string $duedate;

    /**
     * @var bool|null A boolean value to indicate if modifications to the due date should cascade to
     * subsequent jobs. (e.g. Modify the due date of a timer by +15
     * minutes. This flag indicates if a +15 minutes should be applied to all
     * subsequent timers.) This flag only affects timer jobs and only works if due date
     * is not null. Default: `false`
     */
    public ?bool $cascade;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'duedate' => $this->duedate ?? null,
            'cascade' => $this->cascade ?? null,
        ];
    }

}
