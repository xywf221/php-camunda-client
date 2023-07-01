<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricProcessDefinition extends BaseClient
{
    /**
     * Get Cleanable Process Instance Report
     *
     * Retrieves a report about a process definition and finished process instances
     * relevant to history cleanup (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup))
     * so that you can tune the history time to live.
     * These reports include the count of the finished historic process
     * instances, cleanable process instances and basic process definition
     * data - id, key, name and version.
     * The size of the result set can be retrieved by using the
     * [Get Cleanable Process Instance Report Count](https://docs.camunda.org/manual/develop/reference/rest/history/process-definition/get-cleanable-process-instance-report-count/)
     * method.
     *
     * @param GetCleanableHistoricProcessInstanceReportDto|null $queryDto
     * @return array<CleanableHistoricProcessInstanceReportResultDto>
     * @throws GuzzleException
     */
    public function getCleanableHistoricProcessInstanceReport(GetCleanableHistoricProcessInstanceReportDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/process-definition/cleanable-process-instance-report", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CleanableHistoricProcessInstanceReportResultDto::class . '[]');
    }

    /**
     * Get Cleanable Process Instance Report Count
     *
     * Queries for the number of report results about a process definition and finished
     * process instances relevant to history cleanup (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     * Takes the same parameters as the
     * [Get Cleanable Process Instance Report](https://docs.camunda.org/manual/develop/reference/rest/history/process-definition/get-cleanable-process-instance-report/)
     * method.
     *
     * @param GetCleanableHistoricProcessInstanceReportCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getCleanableHistoricProcessInstanceReportCount(GetCleanableHistoricProcessInstanceReportCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/process-definition/cleanable-process-instance-report/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Historic Activity Statistics
     *
     * Retrieves historic statistics of a given process definition, grouped by activities.
     * These statistics include the number of running activity instances and,
     * optionally, the number of canceled activity instances, finished
     * activity instances and activity instances which completed a scope
     * (i.e., in BPMN 2.0 manner: a scope is completed by an activity
     * instance when the activity instance consumed a token but did not emit
     * a new token).
     **Note:** This only includes historic data.
     *
     * @param string $id
     * @param GetHistoricActivityStatisticsDto|null $queryDto
     * @return array<HistoricActivityStatisticsDto>
     * @throws GuzzleException
     */
    public function getHistoricActivityStatistics(string $id, GetHistoricActivityStatisticsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/process-definition/$id/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricActivityStatisticsDto::class . '[]');
    }
}