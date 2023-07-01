<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricDecisionInstance extends BaseClient
{
    /**
     * Get Historic Decision Instances
     *
     * Queries for historic decision instances that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Historic Decision Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/decision-instance/get-decision-instance-query-count/)
     * method.
     *
     * @param GetHistoricDecisionInstancesDto|null $queryDto
     * @return array<HistoricDecisionInstanceDto>
     * @throws GuzzleException
     */
    public function getHistoricDecisionInstances(GetHistoricDecisionInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/decision-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDecisionInstanceDto::class . '[]');
    }

    /**
     * Get Historic Decision Instance Count
     *
     * Queries for the number of historic decision instances that fulfill the given parameters.
     * Takes the same parameters as the
     * [Get Historic Decision Instances](https://docs.camunda.org/manual/develop/reference/rest/history/decision-instance/get-decision-instance-query/)
     * method.
     *
     * @param GetHistoricDecisionInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricDecisionInstancesCount(GetHistoricDecisionInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/decision-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete Async (POST)
     *
     * Delete multiple historic decision instances asynchronously (batch).
     * At least `historicDecisionInstanceIds` or `historicDecisionInstanceQuery`
     * has to be provided. If both are provided then all instances matching query
     * criterion and instances from the list will be deleted.
     *
     * @param DeleteHistoricDecisionInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function deleteAsync(DeleteHistoricDecisionInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/history/decision-instance/delete", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Set Removal Time Async (POST)
     *
     * Sets the removal time to multiple historic decision instances asynchronously
     * (batch).
     *
     * At least `historicDecisionInstanceIds` or
     * `historicDecisionInstanceQuery` has to be provided. If both are
     * provided, all instances matching query criterion and instances from the list
     * will be updated with a removal time.
     *
     * @param SetRemovalTimeToHistoricDecisionInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setRemovalTimeAsyncHistoricDecisionInstance(SetRemovalTimeToHistoricDecisionInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/history/decision-instance/set-removal-time", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Get Historic Decision Instance
     *
     * Retrieves a historic decision instance by id, according to the
     * `HistoricDecisionInstance` interface in the engine.
     *
     * @param string $id
     * @param GetHistoricDecisionInstanceDto|null $queryDto
     * @return HistoricDecisionInstanceDto
     * @throws GuzzleException
     */
    public function getHistoricDecisionInstance(string $id, GetHistoricDecisionInstanceDto $queryDto = null): HistoricDecisionInstanceDto
    {
        $response = $this->client->get("/engine-rest/history/decision-instance/$id", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDecisionInstanceDto::class);
    }
}