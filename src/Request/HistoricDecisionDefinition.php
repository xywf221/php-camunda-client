<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricDecisionDefinition extends BaseClient
{
    /**
     * Get Cleanable Decision Instance Report
     *
     * Retrieves a report about a decision definition and finished decision instances
     * relevant to history cleanup (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)),
     * so that you can tune the history time to live.
     * These reports include the count of the finished historic decision
     * instances, cleanable decision instances and basic decision definition
     * data - id, key, name and version.
     * The size of the result set can be retrieved by using the
     * [Get Cleanable Decision Instance Report Count](https://docs.camunda.org/manual/develop/reference/rest/history/decision-definition/get-cleanable-decision-instance-report-count/) method.
     *
     * @param GetCleanableHistoricDecisionInstanceReportDto|null $queryDto
     * @return array<CleanableHistoricDecisionInstanceReportResultDto>
     * @throws GuzzleException
     */
    public function getCleanableHistoricDecisionInstanceReport(GetCleanableHistoricDecisionInstanceReportDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/decision-definition/cleanable-decision-instance-report", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CleanableHistoricDecisionInstanceReportResultDto::class . '[]');
    }

    /**
     * Get Cleanable Decision Instance Report Count
     *
     * Queries for the number of report results about a decision definition and finished
     * decision instances relevant to history cleanup (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)).
     * Takes the same parameters as the [Get Cleanable Decision Instance Report](https://docs.camunda.org/manual/develop/reference/rest/history/decision-definition/get-cleanable-decision-instance-report/)
     * method.
     *
     * @param GetCleanableHistoricDecisionInstanceReportCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getCleanableHistoricDecisionInstanceReportCount(GetCleanableHistoricDecisionInstanceReportCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/decision-definition/cleanable-decision-instance-report/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }
}