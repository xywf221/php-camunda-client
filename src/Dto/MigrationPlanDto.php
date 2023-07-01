<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationPlanDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the source process definition for the migration.
     */
    public ?string $sourceProcessDefinitionId;

    /**
     * @var string|null The id of the target process definition for the migration.
     */
    public ?string $targetProcessDefinitionId;

    /**
     * @var array<MigrationInstructionDto>|null A list of migration instructions which map equal activities. Each
     * migration instruction is a JSON object with the following properties:
     */
    public ?array $instructions;

    /**
     * @var object|null A map of variables which will be set into the process instances' scope.
     * Each key is a variable name and each value a JSON variable value object.
     */
    public ?object $variables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'sourceProcessDefinitionId' => $this->sourceProcessDefinitionId ?? null,
            'targetProcessDefinitionId' => $this->targetProcessDefinitionId ?? null,
            'instructions' => $this->instructions ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
