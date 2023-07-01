<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Job extends BaseClient
{
    /**
     * Get Jobs
     *
     * Queries for jobs that fulfill given parameters.
     * The size of the result set can be retrieved by using the [Get Job
     * Count](https://docs.camunda.org/manual/develop/reference/rest/job/get-query-count/) method.
     *
     * @param GetJobsDto|null $queryDto
     * @return array<JobDto>
     * @throws GuzzleException
     */
    public function getJobs(GetJobsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/job", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, JobDto::class . '[]');
    }

    /**
     * Get Jobs (POST)
     *
     * Queries for jobs that fulfill given parameters. This method is slightly more
     * powerful than the [Get Jobs](https://docs.camunda.org/manual/develop/reference/rest/job/get-query/)
     * method because it allows filtering by multiple jobs of types `String`,
     * `Number` or `Boolean`.
     *
     * @param QueryJobsDto|null $queryDto
     * @param JobQueryDto $bodyDto
     * @return array<JobDto>
     * @throws GuzzleException
     */
    public function queryJobs(QueryJobsDto $queryDto = null, JobQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/job", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, JobDto::class . '[]');
    }

    /**
     * Get Job Count
     *
     * Queries for the number of jobs that fulfill given parameters.
     * Takes the same parameters as the [Get
     * Jobs](https://docs.camunda.org/manual/develop/reference/rest/job/get-query/) method.
     *
     * @param GetJobsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getJobsCount(GetJobsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/job/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Job Count (POST)
     *
     * Queries for jobs that fulfill given parameters. This method takes the same message
     * body as the [Get Jobs POST](https://docs.camunda.org/manual/develop/reference/rest/job/post-
     * query/) method and therefore it is slightly more powerful than the
     * [Get Job Count](https://docs.camunda.org/manual/develop/reference/rest/job/get-query-count/)
     * method.
     *
     * @param JobQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryJobsCount(JobQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/job/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Set Job Retries Async (POST)
     *
     * Create a batch to set retries of jobs asynchronously.
     *
     * @param SetJobRetriesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setJobRetriesAsyncOperation(SetJobRetriesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/job/retries", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Activate/Suspend Jobs
     *
     * Activates or suspends jobs matching the given criterion.
     * This can only be on of:
     * `jobDefinitionId`
     * `processDefinitionId`
     * `processInstanceId`
     * `processDefinitionKey`
     *
     * @param JobSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateSuspensionStateBy(JobSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Job
     *
     * Deletes a job by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteJob(string $id): void
    {
        $this->client->delete("/engine-rest/job/$id", [
        ]);
    }

    /**
     * Get Job
     *
     * Retrieves a job by id, according to the `Job` interface in the engine.
     *
     * @param string $id
     * @return JobDto
     * @throws GuzzleException
     */
    public function getJob(string $id): JobDto
    {
        $response = $this->client->get("/engine-rest/job/$id", [
        ]);
        return $this->deserializeResponse($response, JobDto::class);
    }

    /**
     * Set Job Due Date
     *
     * Updates the due date of a job by id.
     *
     * @param string $id
     * @param JobDuedateDto $bodyDto
     * @throws GuzzleException
     */
    public function setJobDuedate(string $id, JobDuedateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job/$id/duedate", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Recalculate Job Due Date
     *
     * Recalculates the due date of a job by id.
     *
     * @param string $id
     * @param RecalculateDuedateDto|null $queryDto
     * @throws GuzzleException
     */
    public function recalculateDuedate(string $id, RecalculateDuedateDto $queryDto = null): void
    {
        $this->client->post("/engine-rest/job/$id/duedate/recalculate", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Execute Job
     *
     * Executes a job by id. **Note:** The execution of the job happens synchronously in
     * the same thread.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function executeJob(string $id): void
    {
        $this->client->post("/engine-rest/job/$id/execute", [
        ]);
    }

    /**
     * Set Job Priority
     *
     * Sets the execution priority of a job by id.
     *
     * @param string $id
     * @param PriorityDto $bodyDto
     * @throws GuzzleException
     */
    public function setJobPriority(string $id, PriorityDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job/$id/priority", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Job Retries
     *
     * Sets the retries of the job to the given number of retries by id.
     *
     * @param string $id
     * @param JobRetriesDto $bodyDto
     * @throws GuzzleException
     */
    public function setJobRetries(string $id, JobRetriesDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job/$id/retries", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Exception Stacktrace
     *
     * Retrieves the exception stacktrace corresponding to the passed job id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function getStacktrace(string $id): void
    {
        $this->client->get("/engine-rest/job/$id/stacktrace", [
        ]);
    }

    /**
     * Activate/Suspend Job By Id
     *
     * Activates or suspends a given job by id.
     *
     * @param string $id
     * @param SuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateJobSuspensionState(string $id, SuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job/$id/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }
}