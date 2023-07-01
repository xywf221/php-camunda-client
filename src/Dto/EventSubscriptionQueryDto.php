<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class EventSubscriptionQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the event subscription.
     */
    public ?string $eventSubscriptionId;

    /**
     * @var string|null The name of the event this subscription belongs to as defined in the process model.
     */
    public ?string $eventName;

    /**
     * @var string|null The type of the event subscription.
     */
    public ?string $eventType;

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
     * @var array<string>|null Filter by a comma-separated list of tenant ids.
     * Only select subscriptions that belong to one of the given tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only select subscriptions which have no tenant id.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var bool|null Select event subscriptions which have no tenant id.
     * Can be used in combination with tenantIdIn parameter.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeEventSubscriptionsWithoutTenantId;

    /**
     * @var array<object>|null Apply sorting of the result
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'eventSubscriptionId' => $this->eventSubscriptionId ?? null,
            'eventName' => $this->eventName ?? null,
            'eventType' => $this->eventType ?? null,
            'executionId' => $this->executionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'includeEventSubscriptionsWithoutTenantId' => $this->includeEventSubscriptionsWithoutTenantId ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
