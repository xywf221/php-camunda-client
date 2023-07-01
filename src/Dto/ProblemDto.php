<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProblemDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The message of the problem.
     */
    public ?string $message;

    /**
     * @var int|null The line where the problem occurred.
     */
    public ?int $line;

    /**
     * @var int|null The column where the problem occurred.
     */
    public ?int $column;

    /**
     * @var string|null The main element id where the problem occurred.
     */
    public ?string $mainElementId;

    /**
     * @var array<string>|null A list of element id affected by the problem.
     */
    public ?array $elementIds;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'message' => $this->message ?? null,
            'line' => $this->line ?? null,
            'column' => $this->column ?? null,
            'mainElementId' => $this->mainElementId ?? null,
            'elementIds' => $this->elementIds ?? null,
        ];
    }

}
