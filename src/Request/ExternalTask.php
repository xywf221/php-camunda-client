<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class ExternalTask extends BaseClient
{
    /**
     * Get List
     *
     * Queries for the external tasks that fulfill given parameters. Parameters may be static as well as dynamic
     * runtime properties of executions. The size of the result set can be retrieved by using the
     * [Get External Task Count](https://docs.camunda.org/manual/develop/reference/rest/external-task/get-query-count/) method.
     *
     * @param GetExternalTasksDto|null $queryDto
     * @return array<ExternalTaskDto>
     * @throws GuzzleException
     */
    public function getExternalTasks(GetExternalTasksDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/external-task", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ExternalTaskDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for external tasks that fulfill given parameters in the form of a JSON object.
     *
     * This method is slightly more powerful than the
     * [Get External Tasks](https://docs.camunda.org/manual/develop/reference/rest/external-task/get-query/) method because it allows to
     * specify a hierarchical result sorting.
     *
     * @param QueryExternalTasksDto|null $queryDto
     * @param ExternalTaskQueryDto $bodyDto
     * @return array<ExternalTaskDto>
     * @throws GuzzleException
     */
    public function queryExternalTasks(QueryExternalTasksDto $queryDto = null, ExternalTaskQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/external-task", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ExternalTaskDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of external tasks that fulfill given parameters. Takes the same parameters as the
     * [Get External Tasks](https://docs.camunda.org/manual/develop/reference/rest/external-task/get-query/) method.
     *
     * @param GetExternalTasksCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getExternalTasksCount(GetExternalTasksCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/external-task/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Queries for the number of external tasks that fulfill given parameters. This method takes the same message
     * body as the [Get External Tasks (POST)](https://docs.camunda.org/manual/develop/reference/rest/external-task/post-query/) method.
     *
     * @param ExternalTaskQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryExternalTasksCount(ExternalTaskQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/external-task/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Fetch and Lock
     *
     * Fetches and locks a specific number of external tasks for execution by a worker. Query can be restricted
     * to specific task topics and for each task topic an individual lock time can be provided.
     *
     * @param FetchExternalTasksDto $bodyDto
     * @return array<LockedExternalTaskDto>
     * @throws GuzzleException
     */
    public function fetchAndLock(FetchExternalTasksDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/external-task/fetchAndLock", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, LockedExternalTaskDto::class . '[]');
    }

    /**
     * Set Retries Sync
     *
     * Sets the number of retries left to execute external tasks by id synchronously. If retries are set to 0,
     * an incident is created.
     *
     * @param SetRetriesForExternalTasksDto $bodyDto
     * @throws GuzzleException
     */
    public function setExternalTaskRetries(SetRetriesForExternalTasksDto $bodyDto): void
    {
        $this->client->put("/engine-rest/external-task/retries", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Retries Async
     *
     * Sets the number of retries left to execute external tasks by id asynchronously. If retries are set to 0,
     * an incident is created.
     *
     * @param SetRetriesForExternalTasksDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setExternalTaskRetriesAsyncOperation(SetRetriesForExternalTasksDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/external-task/retries-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Get External Task Topic Names
     *
     * Queries for distinct topic names of external tasks that fulfill given parameters.
     * Query can be restricted to only tasks with retries left, tasks that are locked, or tasks
     * that are unlocked. The parameters withLockedTasks and withUnlockedTasks are
     * exclusive. Setting them both to true will return an empty list.
     * Providing no parameters will return a list of all distinct topic names with external tasks.
     *
     * @param GetTopicNamesDto|null $queryDto
     * @return array<string>
     * @throws GuzzleException
     */
    public function getTopicNames(GetTopicNamesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/external-task/topic-names", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get
     *
     * Retrieves an external task by id, corresponding to the `ExternalTask` interface in the engine.
     *
     * @param string $id
     * @return ExternalTaskDto
     * @throws GuzzleException
     */
    public function getExternalTask(string $id): ExternalTaskDto
    {
        $response = $this->client->get("/engine-rest/external-task/$id", [
        ]);
        return $this->deserializeResponse($response, ExternalTaskDto::class);
    }

    /**
     * Handle BPMN Error
     *
     * Reports a business error in the context of a running external task by id. The error code must be specified
     * to identify the BPMN error handler.
     *
     * @param string $id
     * @param ExternalTaskBpmnError $bodyDto
     * @throws GuzzleException
     */
    public function handleExternalTaskBpmnError(string $id, ExternalTaskBpmnError $bodyDto): void
    {
        $this->client->post("/engine-rest/external-task/$id/bpmnError", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Complete
     *
     * Completes an external task by id and updates process variables.
     *
     * @param string $id
     * @param CompleteExternalTaskDto $bodyDto
     * @throws GuzzleException
     */
    public function completeExternalTaskResource(string $id, CompleteExternalTaskDto $bodyDto): void
    {
        $this->client->post("/engine-rest/external-task/$id/complete", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Error Details
     *
     * Retrieves the error details in the context of a running external task by id.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getExternalTaskErrorDetails(string $id): string
    {
        $response = $this->client->get("/engine-rest/external-task/$id/errorDetails", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Extend Lock
     *
     * Extends the timeout of the lock by a given amount of time.
     *
     * @param string $id
     * @param ExtendLockOnExternalTaskDto $bodyDto
     * @throws GuzzleException
     */
    public function extendLock(string $id, ExtendLockOnExternalTaskDto $bodyDto): void
    {
        $this->client->post("/engine-rest/external-task/$id/extendLock", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Handle Failure
     *
     * Reports a failure to execute an external task by id. A number of retries and a timeout until the task can
     * be retried can be specified. If retries are set to 0, an incident for this task is created.
     *
     * @param string $id
     * @param ExternalTaskFailureDto $bodyDto
     * @throws GuzzleException
     */
    public function handleFailure(string $id, ExternalTaskFailureDto $bodyDto): void
    {
        $this->client->post("/engine-rest/external-task/$id/failure", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     *
     *
     * Lock an external task by a given id for a specified worker and amount of time.
     *
     * @param string $id
     * @param LockExternalTaskDto $bodyDto
     * @throws GuzzleException
     */
    public function lock(string $id, LockExternalTaskDto $bodyDto): void
    {
        $this->client->post("/engine-rest/external-task/$id/lock", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Priority
     *
     * Sets the priority of an existing external task by id. The default value of a priority is 0.
     *
     * @param string $id
     * @param PriorityDto $bodyDto
     * @throws GuzzleException
     */
    public function setExternalTaskResourcePriority(string $id, PriorityDto $bodyDto): void
    {
        $this->client->put("/engine-rest/external-task/$id/priority", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Retries
     *
     * Sets the number of retries left to execute an external task by id. If retries are set to 0, an
     * incident is created.
     *
     * @param string $id
     * @param RetriesDto $bodyDto
     * @throws GuzzleException
     */
    public function setExternalTaskResourceRetries(string $id, RetriesDto $bodyDto): void
    {
        $this->client->put("/engine-rest/external-task/$id/retries", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Unlock
     *
     * Unlocks an external task by id. Clears the task&#039;s lock expiration time and worker id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function unlock(string $id): void
    {
        $this->client->post("/engine-rest/external-task/$id/unlock", [
        ]);
    }
}