<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class ProcessInstance extends BaseClient
{
    /**
     * Get List
     *
     * Queries for process instances that fulfill given parameters.
     * Parameters may be static as well as dynamic runtime properties of process instances.
     * The size of the result set can be retrieved by using the Get Instance Count method.
     *
     * @param GetProcessInstancesDto|null $queryDto
     * @return array<ProcessInstanceDto>
     * @throws GuzzleException
     */
    public function getProcessInstances(GetProcessInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for process instances that fulfill given parameters through a JSON object.
     * This method is slightly more powerful than the Get Instances method because
     * it allows filtering by multiple process variables of types `string`, `number` or `boolean`.
     *
     * @param QueryProcessInstancesDto|null $queryDto
     * @param ProcessInstanceQueryDto $bodyDto
     * @return array<ProcessInstanceDto>
     * @throws GuzzleException
     */
    public function queryProcessInstances(QueryProcessInstancesDto $queryDto = null, ProcessInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/process-instance", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of process instances that fulfill given parameters.
     *
     * @param GetProcessInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getProcessInstancesCount(GetProcessInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/process-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Queries for the number of process instances that fulfill the given parameters.
     * This method takes the same message body as the Get Instances (POST) method and
     * therefore it is slightly more powerful than the Get Instance Count method.
     *
     * @param ProcessInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryProcessInstancesCount(ProcessInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/process-instance/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete Async (POST)
     *
     * Deletes multiple process instances asynchronously (batch).
     *
     * @param DeleteProcessInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function deleteProcessInstancesAsyncOperation(DeleteProcessInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/delete", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Delete Async Historic Query Based (POST)
     *
     * Deletes a set of process instances asynchronously (batch) based on a historic process instance query.
     *
     * @param DeleteProcessInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function deleteAsyncHistoricQueryBased(DeleteProcessInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/delete-historic-query-based", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Set Job Retries Async (POST)
     *
     * Create a batch to set retries of jobs associated with given processes asynchronously.
     *
     * @param SetJobRetriesByProcessDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setRetriesByProcess(SetJobRetriesByProcessDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/job-retries", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Set Job Retries Async Historic Query Based (POST)
     *
     * Create a batch to set retries of jobs asynchronously based on a historic process instance query.
     *
     * @param SetJobRetriesByProcessDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setRetriesByProcessHistoricQueryBased(SetJobRetriesByProcessDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/job-retries-historic-query-based", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Correlate Message Async (POST)
     *
     * Correlates a message asynchronously to executions that are waiting for this message.
     * Messages will not be correlated to process definition-level start message events to start process instances.
     *
     * @param CorrelationMessageAsyncDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function correlateMessageAsyncOperation(CorrelationMessageAsyncDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/message-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Activate/Suspend In Group
     *
     * Activates or suspends process instances by providing certain criteria:
     *
     * # Activate/Suspend Process Instance By Process Definition Id
     * `suspend`
     * `processDefinitionId`
     *
     * # Activate/Suspend Process Instance By Process Definition Key
     * `suspend`
     * `processDefinitionKey`
     * `processDefinitionTenantId`
     * `processDefinitionWithoutTenantId`
     *
     * # Activate/Suspend Process Instance In Group
     * `suspend`
     * `processInstanceIds`
     * `processInstanceQuery`
     * `historicProcessInstanceQuery`
     *
     * @param ProcessInstanceSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateSuspensionState(ProcessInstanceSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-instance/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Activate/Suspend In Batch
     *
     * Activates or suspends process instances asynchronously with a list of process instance ids,
     * a process instance query, and/or a historical process instance query.
     *
     * @param ProcessInstanceSuspensionStateAsyncDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function updateSuspensionStateAsyncOperation(ProcessInstanceSuspensionStateAsyncDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/suspended-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Set Variables Async (POST)
     *
     * Update or create runtime process variables in the root scope of process instances.
     *
     * @param SetVariablesAsyncDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setVariablesAsyncOperation(SetVariablesAsyncDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/variables-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Delete
     *
     * Deletes a running process instance by id.
     *
     * @param string $id
     * @param DeleteProcessInstanceDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteProcessInstance(string $id, DeleteProcessInstanceDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/process-instance/$id", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get Process Instance
     *
     * Retrieves a process instance by id, according to the `ProcessInstance` interface in the engine.
     *
     * @param string $id
     * @return ProcessInstanceDto
     * @throws GuzzleException
     */
    public function getProcessInstance(string $id): ProcessInstanceDto
    {
        $response = $this->client->get("/engine-rest/process-instance/$id", [
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class);
    }

    /**
     * Get Activity Instance
     *
     * Retrieves an Activity Instance (Tree) for a given process instance by id.
     *
     * @param string $id
     * @return ActivityInstanceDto
     * @throws GuzzleException
     */
    public function getActivityInstanceTree(string $id): ActivityInstanceDto
    {
        $response = $this->client->get("/engine-rest/process-instance/$id/activity-instances", [
        ]);
        return $this->deserializeResponse($response, ActivityInstanceDto::class);
    }

    /**
     * Get Process Instance Comments
     *
     * Gets the comments for a process instance by id.
     *
     * @param string $id
     * @return array<CommentDto>
     * @throws GuzzleException
     */
    public function getProcessInstanceComments(string $id): array
    {
        $response = $this->client->get("/engine-rest/process-instance/$id/comment", [
        ]);
        return $this->deserializeResponse($response, CommentDto::class . '[]');
    }

    /**
     * Modify Process Instance Execution State
     *
     * Submits a list of modification instructions to change a process instance&#039;s execution state.
     * A modification instruction is one of the following:
     * Starting execution before an activity
     * Starting execution after an activity on its single outgoing sequence flow
     * Starting execution on a specific sequence flow
     * Canceling an activity instance, transition instance, or all instances (activity or transition) for an activity
     *
     * Instructions are executed immediately and in the order they are provided in this request&#039;s body.
     * Variables can be provided with every starting instruction.
     *
     * The exact semantics of modification can be read about in the [User guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-modification/).
     *
     * @param string $id
     * @param ProcessInstanceModificationDto $bodyDto
     * @throws GuzzleException
     */
    public function modifyProcessInstance(string $id, ProcessInstanceModificationDto $bodyDto): void
    {
        $this->client->post("/engine-rest/process-instance/$id/modification", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Modify Process Instance Execution State Async
     *
     * Submits a list of modification instructions to change a process instance&#039;s execution state async.
     * A modification instruction is one of the following:
     * Starting execution before an activity
     * Starting execution after an activity on its single outgoing sequence flow
     * Starting execution on a specific sequence flow
     * Cancelling an activity instance, transition instance, or all instances (activity or transition) for an activity
     *
     * Instructions are executed asynchronous and in the order they are provided in this request&#039;s body.
     * Variables can be provided with every starting instruction.
     *
     * The exact semantics of modification can be read about in the
     * [User guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-modification/).
     *
     * @param string $id
     * @param ProcessInstanceModificationDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function modifyProcessInstanceAsyncOperation(string $id, ProcessInstanceModificationDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-instance/$id/modification-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Activate/Suspend Process Instance By Id
     *
     * Activates or suspends a given process instance by id.
     *
     * @param string $id
     * @param SuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateSuspensionStateById(string $id, SuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-instance/$id/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Process Variables
     *
     * Retrieves all variables of a given process instance by id.
     *
     * @param string $id
     * @param GetProcessInstanceVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getProcessInstanceVariables(string $id, GetProcessInstanceVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/process-instance/$id/variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update/Delete Process Variables
     *
     * Updates or deletes the variables of a process instance by id. Updates precede deletions.
     * So, if a variable is updated AND deleted, the deletion overrides the update.
     *
     * @param string $id
     * @param PatchVariablesDto $bodyDto
     * @throws GuzzleException
     */
    public function modifyProcessInstanceVariables(string $id, PatchVariablesDto $bodyDto): void
    {
        $this->client->post("/engine-rest/process-instance/$id/variables", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Process Variable
     *
     * Deletes a variable of a process instance by id.
     *
     * @param string $id
     * @param string $varName
     * @throws GuzzleException
     */
    public function deleteProcessInstanceVariable(string $id, string $varName): void
    {
        $this->client->delete("/engine-rest/process-instance/$id/variables/$varName", [
        ]);
    }

    /**
     * Get Process Variable
     *
     * Retrieves a variable of a given process instance by id.
     *
     * @param string $id
     * @param string $varName
     * @param GetProcessInstanceVariableDto|null $queryDto
     * @return VariableValueDto
     * @throws GuzzleException
     */
    public function getProcessInstanceVariable(string $id, string $varName, GetProcessInstanceVariableDto $queryDto = null): VariableValueDto
    {
        $response = $this->client->get("/engine-rest/process-instance/$id/variables/$varName", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class);
    }

    /**
     * Update Process Variable
     *
     * Sets a variable of a given process instance by id.
     *
     * @param string $id
     * @param string $varName
     * @param VariableValueDto $bodyDto
     * @throws GuzzleException
     */
    public function setProcessInstanceVariable(string $id, string $varName, VariableValueDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-instance/$id/variables/$varName", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Process Variable (Binary)
     *
     * Retrieves the content of a Process Variable by the Process Instance id and the Process Variable name.
     * Applicable for byte array or file Process Variables.
     *
     * @param string $id
     * @param string $varName
     * @return string
     * @throws GuzzleException
     */
    public function getProcessInstanceVariableBinary(string $id, string $varName): string
    {
        $response = $this->client->get("/engine-rest/process-instance/$id/variables/$varName/data", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Update Process Variable (Binary)
     *
     * Sets the serialized value for a binary variable or the binary value for a file variable.
     *
     * @param string $id
     * @param string $varName
     * @param MultiFormVariableBinaryDto $bodyDto
     * @throws GuzzleException
     */
    public function setProcessInstanceVariableBinary(string $id, string $varName, MultiFormVariableBinaryDto $bodyDto): void
    {
        $this->client->post("/engine-rest/process-instance/$id/variables/$varName/data", [
            'multipart' => $bodyDto->properties(),
        ]);
    }
}