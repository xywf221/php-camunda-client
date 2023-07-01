<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationInstructionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null The activity ids from the source process definition being mapped.
     */
    public ?array $sourceActivityIds;

    /**
     * @var array<string>|null The activity ids from the target process definition being mapped.
     */
    public ?array $targetActivityIds;

    /**
     * @var bool|null Configuration flag whether event triggers defined are going to be updated during migration.
     */
    public ?bool $updateEventTrigger;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'sourceActivityIds' => $this->sourceActivityIds ?? null,
            'targetActivityIds' => $this->targetActivityIds ?? null,
            'updateEventTrigger' => $this->updateEventTrigger ?? null,
        ];
    }

}
