<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetActivityStatisticsByProcessDefinitionKeyDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Whether to include the number of failed jobs in the result or not. Valid values are `true` or `false`.
     */
    public ?bool $failedJobs;

    /**
     * @var bool|null Valid values for this property are `true` or `false`.
     * If this property has been set to `true` the result will include the corresponding number of incidents
     * for each occurred incident type.
     * If it is set to `false`, the incidents will not be included in the result.
     * Cannot be used in combination with `incidentsForType`.
     */
    public ?bool $incidents;

    /**
     * @var string|null If this property has been set with any incident type (i.e., a string value) the result
     * will only include the number of incidents for the assigned incident type.
     * Cannot be used in combination with `incidents`.
     *
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
     */
    public ?string $incidentsForType;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'failedJobs' => $this->failedJobs ?? null,
            'incidents' => $this->incidents ?? null,
            'incidentsForType' => $this->incidentsForType ?? null,
        ];
    }

}
