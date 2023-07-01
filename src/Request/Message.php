<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Message extends BaseClient
{
    /**
     * Correlate
     *
     * Correlates a message to the process engine to either trigger a message start event or an intermediate message
     * catching event. Internally this maps to the engine&#039;s message correlation builder methods
     * `MessageCorrelationBuilder#correlateWithResult()` and `MessageCorrelationBuilder#correlateAllWithResult()`.
     * For more information about the correlation behavior, see the [Message Events](https://docs.camunda.org/manual/develop/bpmn20/events/message-events/)
     * section of the [BPMN 2.0 Implementation Reference](https://docs.camunda.org/manual/develop/reference/bpmn20/).
     *
     * @param CorrelationMessageDto $bodyDto
     * @return array<MessageCorrelationResultWithVariableDto>
     * @throws GuzzleException
     */
    public function deliverMessage(CorrelationMessageDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/message", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, MessageCorrelationResultWithVariableDto::class . '[]');
    }
}