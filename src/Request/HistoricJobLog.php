<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricJobLog extends BaseClient
{
    /**
     * Get Job Logs
     *
     * Queries for historic job logs that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Job Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/job-log/get-job-log-query-count/)
     * method.
     *
     * @param GetHistoricJobLogsDto|null $queryDto
     * @return array<HistoricJobLogDto>
     * @throws GuzzleException
     */
    public function getHistoricJobLogs(GetHistoricJobLogsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/job-log", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricJobLogDto::class . '[]');
    }

    /**
     * Get Job Logs (POST)
     *
     * Queries for historic job logs that fulfill the given parameters.
     * This method is slightly more powerful than the
     * [Get Job Logs](https://docs.camunda.org/manual/develop/reference/rest/history/job-log/get-job-log-query/)
     * method because it allows filtering by historic job logs values of the
     * different types `String`, `Number` or `Boolean`.
     *
     * @param QueryHistoricJobLogsDto|null $queryDto
     * @param HistoricJobLogQueryDto $bodyDto
     * @return array<HistoricJobLogDto>
     * @throws GuzzleException
     */
    public function queryHistoricJobLogs(QueryHistoricJobLogsDto $queryDto = null, HistoricJobLogQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/job-log", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricJobLogDto::class . '[]');
    }

    /**
     * Get Job Log Count
     *
     * Queries for the number of historic job logs that fulfill the given parameters.
     * Takes the same parameters as the
     * [Get Job Logs](https://docs.camunda.org/manual/develop/reference/rest/history/job-log/get-job-log-query/)
     * method.
     *
     * @param GetHistoricJobLogsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricJobLogsCount(GetHistoricJobLogsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/job-log/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Job Log Count (POST)
     *
     * Queries for the number of historic job logs that fulfill the given parameters.
     * This method takes the same message body as the
     * [Get Job Logs (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/job-log/post-job-log-query/)
     * method and therefore it is slightly more powerful than the
     * [Get Job Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/job-log/get-job-log-query-count/)
     * method.
     *
     * @param HistoricJobLogQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricJobLogsCount(HistoricJobLogQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/job-log/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Job Log
     *
     * Retrieves a historic job log by id.
     *
     * @param string $id
     * @return HistoricJobLogDto
     * @throws GuzzleException
     */
    public function getHistoricJobLog(string $id): HistoricJobLogDto
    {
        $response = $this->client->get("/engine-rest/history/job-log/$id", [
        ]);
        return $this->deserializeResponse($response, HistoricJobLogDto::class);
    }

    /**
     * Get Job Log Exception Stacktrace
     *
     * Retrieves the corresponding exception stacktrace to the passed historic job log by
     * id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function getStacktraceHistoricJobLog(string $id): void
    {
        $this->client->get("/engine-rest/history/job-log/$id/stacktrace", [
        ]);
    }
}