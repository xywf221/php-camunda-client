<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricExternalTaskLog extends BaseClient
{
    /**
     * Get External Task Logs
     *
     * Queries for historic external task logs that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get External Task Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/external-task-log/get-external-task-log-query-count/)
     * method.
     *
     * @param GetHistoricExternalTaskLogsDto|null $queryDto
     * @return array<HistoricExternalTaskLogDto>
     * @throws GuzzleException
     */
    public function getHistoricExternalTaskLogs(GetHistoricExternalTaskLogsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/external-task-log", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricExternalTaskLogDto::class . '[]');
    }

    /**
     * Get External Task Logs (POST)
     *
     * Queries for historic external task logs that fulfill the given parameters.
     * This method is slightly more powerful than the
     * [Get External Task Logs](https://docs.camunda.org/manual/develop/reference/rest/history/external-task-log/get-external-task-log-query/)
     * method because it allows filtering by historic external task logs
     * values of the different types `String`, `Number` or `Boolean`.
     *
     * @param HistoricExternalTaskLogQueryDto $bodyDto
     * @return array<HistoricExternalTaskLogDto>
     * @throws GuzzleException
     */
    public function queryHistoricExternalTaskLogs(HistoricExternalTaskLogQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/external-task-log", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricExternalTaskLogDto::class . '[]');
    }

    /**
     * Get External Task Log Count
     *
     * Queries for the number of historic external task logs that fulfill the given
     * parameters.
     * Takes the same parameters as the
     * [Get External Task Logs](https://docs.camunda.org/manual/develop/reference/rest/history/external-task-log/get-external-task-log-query/)
     * method.
     *
     * @param GetHistoricExternalTaskLogsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricExternalTaskLogsCount(GetHistoricExternalTaskLogsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/external-task-log/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get External Task Log Count (POST)
     *
     * Queries for the number of historic external task logs that fulfill the given
     * parameters.
     * This method takes the same message body as the
     * [Get External Task Logs (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/external-task-log/post-external-task-log-query/)
     * method and therefore it is slightly more powerful than the
     * [Get External Task Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/external-task-log/get-external-task-log-query-count/)
     * method.
     *
     * @param HistoricExternalTaskLogQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricExternalTaskLogsCount(HistoricExternalTaskLogQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/external-task-log/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get External Task Log
     *
     * Retrieves a historic external task log by id.
     *
     * @param string $id
     * @return HistoricExternalTaskLogDto
     * @throws GuzzleException
     */
    public function getHistoricExternalTaskLog(string $id): HistoricExternalTaskLogDto
    {
        $response = $this->client->get("/engine-rest/history/external-task-log/$id", [
        ]);
        return $this->deserializeResponse($response, HistoricExternalTaskLogDto::class);
    }

    /**
     * Get External Task Log Error Details
     *
     * Retrieves the corresponding error details of the passed historic external task log
     * by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function getErrorDetailsHistoricExternalTaskLog(string $id): void
    {
        $this->client->get("/engine-rest/history/external-task-log/$id/error-details", [
        ]);
    }
}