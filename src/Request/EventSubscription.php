<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class EventSubscription extends BaseClient
{
    /**
     * Get List
     *
     * Queries for event subscriptions that fulfill given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Event Subscriptions count](https://docs.camunda.org/manual/develop/reference/rest/event-subscription/get-query-count/) method.
     *
     * @param GetEventSubscriptionsDto|null $queryDto
     * @return array<EventSubscriptionDto>
     * @throws GuzzleException
     */
    public function getEventSubscriptions(GetEventSubscriptionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/event-subscription", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, EventSubscriptionDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of event subscriptions that fulfill given parameters.
     * Takes the same parameters as the
     * [Get Event Subscriptions](https://docs.camunda.org/manual/develop/reference/rest/event-subscription/get-query/) method.
     *
     * @param GetEventSubscriptionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getEventSubscriptionsCount(GetEventSubscriptionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/event-subscription/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }
}