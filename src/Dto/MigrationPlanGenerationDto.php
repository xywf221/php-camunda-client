<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationPlanGenerationDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var bool|null A boolean flag indicating whether instructions between events should be configured
     * to update the event triggers.
     */
    public ?bool $updateEventTriggers;

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
            'updateEventTriggers' => $this->updateEventTriggers ?? null,
            'variables' => $this->variables ?? null,
        ];
    }

}
