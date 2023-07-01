<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ResourceReportDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<ProblemDto>|null A list of errors occurred during parsing.
     */
    public ?array $errors;

    /**
     * @var array<ProblemDto>|null A list of warnings occurred during parsing.
     */
    public ?array $warnings;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'errors' => $this->errors ?? null,
            'warnings' => $this->warnings ?? null,
        ];
    }

}
