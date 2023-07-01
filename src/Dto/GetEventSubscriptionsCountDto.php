<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetEventSubscriptionsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Only select subscription with the given id.
     */
    public ?string $eventSubscriptionId;

    /**
     * @var string|null Only select subscriptions for events with the given name.
     */
    public ?string $eventName;

    /**
     * @var string|null Only select subscriptions for events with the given type.
     * Valid values: `message`, `signal`, `compensate` and `conditional`.
     */
    public ?string $eventType;

    /**
     * @var string|null Only select subscriptions that belong to an execution with the given id.
     */
    public ?string $executionId;

    /**
     * @var string|null Only select subscriptions that belong to a process instance with the given id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Only select subscriptions that belong to an activity with the given id.
     */
    public ?string $activityId;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids.
     * Only select subscriptions that belong to one of the given tenant ids.
     */
    public ?string $tenantIdIn;

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
        ];
    }

}
