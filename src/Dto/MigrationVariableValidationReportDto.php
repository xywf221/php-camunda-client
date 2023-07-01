<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationVariableValidationReportDto extends VariableValueDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of variable validation report messages.
     */
    public ?array $failures;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'failures' => $this->failures ?? null,
        ];
    }

}
