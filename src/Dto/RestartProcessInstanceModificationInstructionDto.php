<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class RestartProcessInstanceModificationInstructionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory**. One of the following values: `startBeforeActivity`, `startAfterActivity`, `startTransition`.
     * A `startBeforeActivity` instruction requests to enter a given activity.
     * A `startAfterActivity` instruction requests to execute the single outgoing sequence flow of a given activity.
     * A `startTransition` instruction requests to execute a specific sequence flow.
     */
    public string $type;

    /**
     * @var string|null **Can be used with instructions of types** `startBeforeActivity`
     * and `startAfterActivity`. Specifies the sequence flow to start.
     */
    public ?string $activityId;

    /**
     * @var string|null **Can be used with instructions of types** `startTransition`.
     * Specifies the sequence flow to start.
     */
    public ?string $transitionId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'type' => $this->type ?? null,
            'activityId' => $this->activityId ?? null,
            'transitionId' => $this->transitionId ?? null,
        ];
    }

}
