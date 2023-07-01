<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Execution extends BaseClient
{
    /**
     * Get Executions
     *
     * Queries for the executions that fulfill given parameters.
     * Parameters may be static as well as dynamic runtime properties of
     * executions.
     * The size of the result set can be retrieved by using the [Get
     * Execution Count](https://docs.camunda.org/manual/develop/reference/rest/execution/get-query-count/)
     * method.
     *
     * @param GetExecutionsDto|null $queryDto
     * @return array<ExecutionDto>
     * @throws GuzzleException
     */
    public function getExecutions(GetExecutionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/execution", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ExecutionDto::class . '[]');
    }

    /**
     * Get Executions (POST)
     *
     * Queries for executions that fulfill given parameters through a JSON object.
     * This method is slightly more powerful than the [Get
     * Executions](https://docs.camunda.org/manual/develop/reference/rest/execution/get-query/) method
     * because it allows
     * to filter by multiple instance and execution variables of types
     * `String`, `Number` or `Boolean`.
     *
     * @param QueryExecutionsDto|null $queryDto
     * @param ExecutionQueryDto $bodyDto
     * @return array<ExecutionDto>
     * @throws GuzzleException
     */
    public function queryExecutions(QueryExecutionsDto $queryDto = null, ExecutionQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/execution", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ExecutionDto::class . '[]');
    }

    /**
     * Get Execution Count
     *
     * Queries for the number of executions that fulfill given parameters.
     * Takes the same parameters as the [Get
     * Executions](https://docs.camunda.org/manual/develop/reference/rest/execution/get-query/) method.
     *
     * @param GetExecutionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getExecutionsCount(GetExecutionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/execution/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Execution Count (POST)
     *
     * Queries for the number of executions that fulfill given parameters. This method
     * takes the same message body as the [Get Executions
     * POST](https://docs.camunda.org/manual/develop/reference/rest/execution/post-query/) method and
     * therefore it is slightly more powerful than the [Get Execution
     * Count](https://docs.camunda.org/manual/develop/reference/rest/execution/get-query-count/) method.
     *
     * @param ExecutionQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryExecutionsCount(ExecutionQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/execution/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Execution
     *
     * Retrieves an execution by id, according to the `Execution` interface in the
     * engine.
     *
     * @param string $id
     * @return ExecutionDto
     * @throws GuzzleException
     */
    public function getExecution(string $id): ExecutionDto
    {
        $response = $this->client->get("/engine-rest/execution/$id", [
        ]);
        return $this->deserializeResponse($response, ExecutionDto::class);
    }

    /**
     * Create Incident
     *
     * Creates a custom incident with given properties.
     *
     * @param string $id
     * @param CreateIncidentDto $bodyDto
     * @return IncidentDto
     * @throws GuzzleException
     */
    public function createIncident(string $id, CreateIncidentDto $bodyDto): IncidentDto
    {
        $response = $this->client->post("/engine-rest/execution/$id/create-incident", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, IncidentDto::class);
    }

    /**
     * Get Local Execution Variables
     *
     * Retrieves all variables of a given execution by id.
     *
     * @param string $id
     * @param GetLocalExecutionVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getLocalExecutionVariables(string $id, GetLocalExecutionVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/execution/$id/localVariables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update/Delete Local Execution Variables
     *
     * Updates or deletes the variables in the context of an execution by id. The updates
     * do not propagate upwards in the execution hierarchy.
     * Updates precede deletions. So, if a variable is updated AND deleted,
     * the deletion overrides the update.
     *
     * @param string $id
     * @param PatchVariablesDto $bodyDto
     * @throws GuzzleException
     */
    public function modifyLocalExecutionVariables(string $id, PatchVariablesDto $bodyDto): void
    {
        $this->client->post("/engine-rest/execution/$id/localVariables", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Local Execution Variable
     *
     * Deletes a variable in the context of a given execution by id. Deletion does not
     * propagate upwards in the execution hierarchy.
     *
     * @param string $id
     * @param string $varName
     * @throws GuzzleException
     */
    public function deleteLocalExecutionVariable(string $id, string $varName): void
    {
        $this->client->delete("/engine-rest/execution/$id/localVariables/$varName", [
        ]);
    }

    /**
     * Get Local Execution Variable
     *
     * Retrieves a variable from the context of a given execution by id. Does not traverse
     * the parent execution hierarchy.
     *
     * @param string $id
     * @param string $varName
     * @param GetLocalExecutionVariableDto|null $queryDto
     * @return VariableValueDto
     * @throws GuzzleException
     */
    public function getLocalExecutionVariable(string $id, string $varName, GetLocalExecutionVariableDto $queryDto = null): VariableValueDto
    {
        $response = $this->client->get("/engine-rest/execution/$id/localVariables/$varName", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class);
    }

    /**
     * Put Local Execution Variable
     *
     * Sets a variable in the context of a given execution by id. Update does not
     * propagate upwards in the execution hierarchy.
     *
     * @param string $id
     * @param string $varName
     * @param VariableValueDto $bodyDto
     * @throws GuzzleException
     */
    public function putLocalExecutionVariable(string $id, string $varName, VariableValueDto $bodyDto): void
    {
        $this->client->put("/engine-rest/execution/$id/localVariables/$varName", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Local Execution Variable (Binary)
     *
     * Retrieves a binary variable from the context of a given execution by id. Does not
     * traverse the parent execution hierarchy. Applicable for byte array and
     * file variables.
     *
     * @param string $id
     * @param string $varName
     * @return string
     * @throws GuzzleException
     */
    public function getLocalExecutionVariableBinary(string $id, string $varName): string
    {
        $response = $this->client->get("/engine-rest/execution/$id/localVariables/$varName/data", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Post Local Execution Variable (Binary)
     *
     * Sets the serialized value for a binary variable or the binary value for a file
     * variable in the context of a given execution by id.
     *
     * @param string $id
     * @param string $varName
     * @param MultiFormVariableBinaryDto $bodyDto
     * @throws GuzzleException
     */
    public function setLocalExecutionVariableBinary(string $id, string $varName, MultiFormVariableBinaryDto $bodyDto): void
    {
        $this->client->post("/engine-rest/execution/$id/localVariables/$varName/data", [
            'multipart' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Message Event Subscription
     *
     * Retrieves a message event subscription for a given execution by id and a message
     * name.
     *
     * @param string $id
     * @param string $messageName
     * @return EventSubscriptionDto
     * @throws GuzzleException
     */
    public function getMessageEventSubscription(string $id, string $messageName): EventSubscriptionDto
    {
        $response = $this->client->get("/engine-rest/execution/$id/messageSubscriptions/$messageName", [
        ]);
        return $this->deserializeResponse($response, EventSubscriptionDto::class);
    }

    /**
     * Trigger Message Event Subscription
     *
     * Delivers a message to a specific execution by id, to trigger an existing message
     * event subscription. Inject process variables as the message&#039;s
     * payload.
     *
     * @param string $id
     * @param string $messageName
     * @param ExecutionTriggerDto $bodyDto
     * @throws GuzzleException
     */
    public function triggerEvent(string $id, string $messageName, ExecutionTriggerDto $bodyDto): void
    {
        $this->client->post("/engine-rest/execution/$id/messageSubscriptions/$messageName/trigger", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Trigger Execution
     *
     * Signals an execution by id. Can for example be used to explicitly skip user tasks
     * or signal asynchronous continuations.
     *
     * @param string $id
     * @param ExecutionTriggerDto $bodyDto
     * @throws GuzzleException
     */
    public function signalExecution(string $id, ExecutionTriggerDto $bodyDto): void
    {
        $this->client->post("/engine-rest/execution/$id/signal", [
            'json' => $bodyDto->properties(),
        ]);
    }
}