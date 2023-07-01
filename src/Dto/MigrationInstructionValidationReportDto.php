<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationInstructionValidationReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var MigrationInstructionDto
     */
    public MigrationInstructionDto $instruction;

    /**
     * @var array<string>|null A list of instruction validation report messages.
     */
    public ?array $failures;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'instruction' => $this->instruction ?? null,
            'failures' => $this->failures ?? null,
        ];
    }

}
