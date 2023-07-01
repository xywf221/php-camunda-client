<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class EventSubscriptionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the event subscription.
     */
    public ?string $id;

    /**
     * @var string|null The type of the event subscription.
     */
    public ?string $eventType;

    /**
     * @var string|null The name of the event this subscription belongs to as defined in the process model.
     */
    public ?string $eventName;

    /**
     * @var string|null The execution that is subscribed on the referenced event.
     */
    public ?string $executionId;

    /**
     * @var string|null The process instance this subscription belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The identifier of the activity that this event subscription belongs to.
     * This could for example be the id of a receive task.
     */
    public ?string $activityId;

    /**
     * @var string|null The time this event subscription was created.
     */
    public ?string $createdDate;

    /**
     * @var string|null The id of the tenant this event subscription belongs to.
     * Can be `null` if the subscription belongs to no single tenant.
     */
    public ?string $tenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'eventType' => $this->eventType ?? null,
            'eventName' => $this->eventName ?? null,
            'executionId' => $this->executionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'createdDate' => $this->createdDate ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
