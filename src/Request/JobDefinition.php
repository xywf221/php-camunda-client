<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class JobDefinition extends BaseClient
{
    /**
     * Get Job Definitions
     *
     * Queries for job definitions that fulfill given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Job Definition Count](https://docs.camunda.org/manual/develop/reference/rest/job-definition/get-query-count/)
     * method.
     *
     * @param GetJobDefinitionsDto|null $queryDto
     * @return array<JobDefinitionDto>
     * @throws GuzzleException
     */
    public function getJobDefinitions(GetJobDefinitionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/job-definition", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, JobDefinitionDto::class . '[]');
    }

    /**
     * Get Job Definitions (POST)
     *
     * Queries for job definitions that fulfill given parameters. This method is slightly
     * more powerful than the
     * [Get Job Definitions](https://docs.camunda.org/manual/develop/reference/rest/job-definition/get-query/)
     * method because it allows filtering by multiple job definitions of
     * types `String`, `Number` or `Boolean`.
     *
     * @param QueryJobDefinitionsDto|null $queryDto
     * @param JobDefinitionQueryDto $bodyDto
     * @return array<JobDefinitionDto>
     * @throws GuzzleException
     */
    public function queryJobDefinitions(QueryJobDefinitionsDto $queryDto = null, JobDefinitionQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/job-definition", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, JobDefinitionDto::class . '[]');
    }

    /**
     * Get Job Definition Count
     *
     * Queries for the number of job definitions that fulfill given parameters.
     * Takes the same parameters as the
     * [Get Job Definitions](https://docs.camunda.org/manual/develop/reference/rest/job-definition/get-query/)
     * method.
     *
     * @param GetJobDefinitionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getJobDefinitionsCount(GetJobDefinitionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/job-definition/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Job Definition Count (POST)
     *
     * Queries for the number of job definitions that fulfill given parameters. This
     * method takes the same message body as the
     * [Get Job Definitions (POST)](https://docs.camunda.org/manual/develop/reference/rest/job-definition/post-query/)
     * method and therefore it is slightly more powerful than the
     * [Get Job Definition Count](https://docs.camunda.org/manual/develop/reference/rest/job-definition/get-query-count/)
     * method.
     *
     * @param JobDefinitionQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryJobDefinitionsCount(JobDefinitionQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/job-definition/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Activate/Suspend Job Definitions
     *
     * Activates or suspends job definitions with the given process definition id or process definition key.
     *
     * @param JobDefinitionsSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateSuspensionStateJobDefinitions(JobDefinitionsSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job-definition/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Job Definition
     *
     * Retrieves a job definition by id, according to the `JobDefinition` interface in the engine.
     *
     * @param string $id
     * @return JobDefinitionDto
     * @throws GuzzleException
     */
    public function getJobDefinition(string $id): JobDefinitionDto
    {
        $response = $this->client->get("/engine-rest/job-definition/$id", [
        ]);
        return $this->deserializeResponse($response, JobDefinitionDto::class);
    }

    /**
     * Set Job Definition Priority by Id
     *
     * Sets an overriding execution priority for jobs with the given definition id.
     * Optionally, the priorities of all the definitions&#039; existing jobs are
     * updated accordingly. The priority can be reset by setting it to
     * `null`, meaning that a new job&#039;s priority will not be determined based
     * on its definition&#039;s priority any longer. See the
     * [user guide on job prioritization](https://docs.camunda.org/manual/develop/user-guide/process-engine/the-job-executor/#set-job-definition-priorities-via-managementservice-api)
     * for details.
     *
     * @param string $id
     * @param JobDefinitionPriorityDto $bodyDto
     * @throws GuzzleException
     */
    public function setJobPriorityJobDefinition(string $id, JobDefinitionPriorityDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job-definition/$id/jobPriority", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Job Retries By Job Definition Id
     *
     * Sets the number of retries of all **failed** jobs associated with the given job
     * definition id.
     *
     * @param string $id
     * @param RetriesDto $bodyDto
     * @throws GuzzleException
     */
    public function setJobRetriesJobDefinition(string $id, RetriesDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job-definition/$id/retries", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Activate/Suspend Job Definition By Id
     *
     * Activates or suspends a given job definition by id.
     *
     * @param string $id
     * @param JobDefinitionSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateSuspensionStateJobDefinition(string $id, JobDefinitionSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/job-definition/$id/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }
}