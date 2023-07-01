<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class JobDefinitionSuspensionStateDto extends SuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null A `Boolean` value which indicates whether to activate or suspend also all jobs of
     * the referenced job definitions. When the value is set to `true`, all jobs
     * of the provided job definitions will be activated or suspended and
     * when the value is set to `false`, the suspension state of all jobs
     * of the provided job definitions will not be updated.
     */
    public ?bool $includeJobs;

    /**
     * @var string|null The date on which the referenced job definitions will be activated or suspended. If null,
     * the suspension state of the given job definitions is updated
     * immediately. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format `yyyy-MM-
     * dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executionDate;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'includeJobs' => $this->includeJobs ?? null,
            'executionDate' => $this->executionDate ?? null,
        ];
    }

}
