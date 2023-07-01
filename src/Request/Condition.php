<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Condition extends BaseClient
{
    /**
     * Evaluate
     *
     * Triggers evaluation of conditions for conditional start event(s).
     * Internally this maps to the engines condition evaluation builder method ConditionEvaluationBuilder#evaluateStartConditions().
     * For more information see the [Conditional Start Events](https://docs.camunda.org/manual/develop/reference/bpmn20/events/conditional-events/#conditional-start-event)
     * section of the [BPMN 2.0 Implementation Reference](https://docs.camunda.org/manual/develop/reference/bpmn20/).
     *
     * @param EvaluationConditionDto $bodyDto
     * @return array<ProcessInstanceDto>
     * @throws GuzzleException
     */
    public function evaluateCondition(EvaluationConditionDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/condition", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class . '[]');
    }
}