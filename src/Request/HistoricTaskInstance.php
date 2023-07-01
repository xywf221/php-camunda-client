<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricTaskInstance extends BaseClient
{
    /**
     * Get Tasks (Historic)
     *
     * Queries for historic tasks that fulfill the given parameters. The size of the result
     * set can be retrieved by using the
     * [Get Task Count](https://docs.camunda.org/manual/develop/reference/rest/history/task/get-task-query-count/)
     * method.
     *
     * @param GetHistoricTaskInstancesDto|null $queryDto
     * @return array<HistoricTaskInstanceDto>
     * @throws GuzzleException
     */
    public function getHistoricTaskInstances(GetHistoricTaskInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/task", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricTaskInstanceDto::class . '[]');
    }

    /**
     * Get Tasks (Historic) (POST)
     *
     * Queries for historic tasks that fulfill the given parameters. This method is slightly more powerful
     * than the [Get Tasks (Historic)](https://docs.camunda.org/manual/develop/reference/rest/history/task/get-task-query/) method because
     * it allows filtering by multiple process or task variables of types `String`, `Number` or `Boolean`.
     * The size of the result set can be retrieved by using the
     * [Get Task Count (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/task/post-task-query-count/)
     * method.
     *
     * @param QueryHistoricTaskInstancesDto|null $queryDto
     * @param HistoricTaskInstanceQueryDto $bodyDto
     * @return array<HistoricTaskInstanceDto>
     * @throws GuzzleException
     */
    public function queryHistoricTaskInstances(QueryHistoricTaskInstancesDto $queryDto = null, HistoricTaskInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/task", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricTaskInstanceDto::class . '[]');
    }

    /**
     * Get Task Count
     *
     * Queries for the number of historic tasks that fulfill the given parameters.
     * Takes the same parameters as the
     * [Get Tasks (Historic)](https://docs.camunda.org/manual/develop/reference/rest/history/task/get-task-query/)
     * method.
     *
     * @param GetHistoricTaskInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricTaskInstancesCount(GetHistoricTaskInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/task/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Task Count (POST)
     *
     * Queries for the number of historic tasks that fulfill the given parameters. Takes the
     * same parameters as the [Get Tasks (Historic)](https://docs.camunda.org/manual/develop/reference/rest/history/task/get-task-query/)
     * method. Corresponds to the size of the result set of the
     * [Get Tasks (Historic) (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/task/post-task-query/)
     * method and takes the same parameters.
     *
     * @param HistoricTaskInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricTaskInstancesCount(HistoricTaskInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/task/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Task Report (Historic)
     *
     * Retrieves a report of completed tasks. When the report type is set to `count`, the
     * report contains a list of completed task counts where an entry contains the task name, the
     * definition key of the task, the process definition id, the process definition key, the process
     * definition name and the count of how many tasks were completed for the specified key in a given
     * period. When the report type is set to `duration`, the report contains a minimum, maximum and
     * average duration value of all completed task instances in a given period.
     *
     * @param GetHistoricTaskInstanceReportDto|null $queryDto
     * @return array<HistoricTaskInstanceReportResultDto>
     * @throws GuzzleException
     */
    public function getHistoricTaskInstanceReport(GetHistoricTaskInstanceReportDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/task/report", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricTaskInstanceReportResultDto::class . '[]');
    }
}