<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDefinitionPriorityDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null The new execution priority number for jobs of the given definition. The
     * definition's priority can be reset by using the value `null`. In
     * that case, the job definition's priority no longer applies but a new
     * job's priority is determined as specified in the process model.
     */
    public ?int $priority;

    /**
     * @var bool|null A boolean value indicating whether existing jobs of the given definition should
     * receive the priority as well. Default value is `false`. Can only be
     * `true` when the __priority__ parameter is not `null`.
     */
    public ?bool $includeJobs;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'priority' => $this->priority ?? null,
            'includeJobs' => $this->includeJobs ?? null,
        ];
    }

}
