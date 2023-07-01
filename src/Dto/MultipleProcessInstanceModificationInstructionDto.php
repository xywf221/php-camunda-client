<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MultipleProcessInstanceModificationInstructionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory**. One of the following values: `cancel`, `startBeforeActivity`, `startAfterActivity`, `startTransition`.
     * A cancel instruction requests cancellation of a single activity instance or all instances of one activity.
     * A startBeforeActivity instruction requests to enter a given activity.
     * A startAfterActivity instruction requests to execute the single outgoing sequence flow of a given activity.
     * A startTransition instruction requests to execute a specific sequence flow.
     */
    public string $type;

    /**
     * @var string|null Can be used with instructions of types `startTransition`. Specifies the sequence flow to start.
     */
    public ?string $activityId;

    /**
     * @var string|null Can be used with instructions of types `startTransition`. Specifies the sequence flow to start.
     */
    public ?string $transitionId;

    /**
     * @var bool|null Can be used with instructions of type cancel. Prevents the deletion of new created activity instances.
     */
    public ?bool $cancelCurrentActiveActivityInstances;


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
            'cancelCurrentActiveActivityInstances' => $this->cancelCurrentActiveActivityInstances ?? null,
        ];
    }

}
