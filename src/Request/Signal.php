<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Signal extends BaseClient
{
    /**
     * Event
     *
     * A signal is an event of global scope (broadcast semantics) and is delivered to all
     * active handlers. Internally this maps to the engine&#039;s signal event received builder
     * method `RuntimeService#createSignalEvent()`. For more information about the signal
     * behavior, see the [Signal Events](https://docs.camunda.org/manual/develop/reference/bpmn20/events/signal-events/)
     * section of the [BPMN 2.0 Implementation Reference](https://docs.camunda.org/manual/develop/reference/bpmn20/).
     *
     * @param SignalDto $bodyDto
     * @throws GuzzleException
     */
    public function throwSignal(SignalDto $bodyDto): void
    {
        $this->client->post("/engine-rest/signal", [
            'json' => $bodyDto->properties(),
        ]);
    }
}