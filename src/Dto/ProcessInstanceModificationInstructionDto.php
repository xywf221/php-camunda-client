<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceModificationInstructionDto implements JsonSerializable, RequestPropertiesInterface
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
     * @var TriggerVariableValueDto
     */
    public TriggerVariableValueDto $variables;

    /**
     * @var string|null Can be used with instructions of types `startTransition`. Specifies the sequence flow to start.
     */
    public ?string $activityId;

    /**
     * @var string|null Can be used with instructions of types `startTransition`. Specifies the sequence flow to start.
     */
    public ?string $transitionId;

    /**
     * @var string|null Can be used with instructions of type `cancel`. Specifies the activity instance to cancel.
     * Valid values are the activity instance IDs supplied by the [Get Activity Instance request](https://docs.camunda.org/manual/develop/reference/rest/process-instance/get-activity-instances/).
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null Can be used with instructions of type `cancel`. Specifies the transition instance to cancel.
     * Valid values are the transition instance IDs supplied by the [Get Activity Instance request](https://docs.camunda.org/manual/develop/reference/rest/process-instance/get-activity-instances/).
     */
    public ?string $transitionInstanceId;

    /**
     * @var string|null Can be used with instructions of type `startBeforeActivity`, `startAfterActivity`, and `startTransition`.
     * Valid values are the activity instance IDs supplied by the Get Activity Instance request.
     * If there are multiple parent activity instances of the targeted activity,
     * this specifies the ancestor scope in which hierarchy the activity/transition is to be instantiated.
     *
     * Example: When there are two instances of a subprocess and an activity contained in the subprocess is to be started,
     * this parameter allows to specifiy under which subprocess instance the activity should be started.
     */
    public ?string $ancestorActivityInstanceId;

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
            'variables' => $this->variables ?? null,
            'activityId' => $this->activityId ?? null,
            'transitionId' => $this->transitionId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'transitionInstanceId' => $this->transitionInstanceId ?? null,
            'ancestorActivityInstanceId' => $this->ancestorActivityInstanceId ?? null,
            'cancelCurrentActiveActivityInstances' => $this->cancelCurrentActiveActivityInstances ?? null,
        ];
    }

}
