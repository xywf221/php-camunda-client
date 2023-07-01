<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoryCleanup extends BaseClient
{
    /**
     * Clean up history (POST)
     *
     * Schedules asynchronous history cleanup (See
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     **Note:** This endpoint will return at most a single history cleanup job.
     * Since version `7.9.0` it is possible to configure multiple
     * [parallel history cleanup jobs](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#parallel-execution). Use
     * [`GET /history/cleanup/jobs`](https://docs.camunda.org/manual/develop/reference/rest/history/history-cleanup/get-history-cleanup-jobs)
     * to find all the available history cleanup jobs.
     *
     * @param CleanupAsyncDto|null $queryDto
     * @return JobDto
     * @throws GuzzleException
     */
    public function cleanupAsync(CleanupAsyncDto $queryDto = null): JobDto
    {
        $response = $this->client->post("/engine-rest/history/cleanup", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, JobDto::class);
    }

    /**
     * Get History Cleanup Configuration
     *
     * Retrieves history cleanup batch window configuration (See
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     *
     * @return HistoryCleanupConfigurationDto
     * @throws GuzzleException
     */
    public function getHistoryCleanupConfiguration(): HistoryCleanupConfigurationDto
    {
        $response = $this->client->get("/engine-rest/history/cleanup/configuration", [
        ]);
        return $this->deserializeResponse($response, HistoryCleanupConfigurationDto::class);
    }

    /**
     * Find clean up history job (GET)
     *
     * **Deprecated!** Use `GET /history/cleanup/jobs` instead.
     *
     * Finds history cleanup job (See
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     *
     * @return JobDto
     * @throws GuzzleException
     */
    public function findCleanupJob(): JobDto
    {
        $response = $this->client->get("/engine-rest/history/cleanup/job", [
        ]);
        return $this->deserializeResponse($response, JobDto::class);
    }

    /**
     * Find clean up history jobs (GET)
     *
     * Finds history cleanup jobs (See
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     *
     * @return array<JobDto>
     * @throws GuzzleException
     */
    public function findCleanupJobs(): array
    {
        $response = $this->client->get("/engine-rest/history/cleanup/jobs", [
        ]);
        return $this->deserializeResponse($response, JobDto::class . '[]');
    }
}