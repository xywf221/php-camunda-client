<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationPlanReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<MigrationInstructionValidationReportDto>|null The list of instruction validation reports. If no validation
     * errors are detected it is an empty list.
     */
    public ?array $instructionReports;

    /**
     * @var object|null A map of variable reports.
     * Each key is a variable name and each value a JSON object consisting of the variable's type, value,
     * value info object and a list of failures.
     */
    public ?object $variableReports;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'instructionReports' => $this->instructionReports ?? null,
            'variableReports' => $this->variableReports ?? null,
        ];
    }

}
