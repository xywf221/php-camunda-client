<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricIncident extends BaseClient
{
    /**
     * Get Incidents
     *
     * Queries for historic incidents that fulfill given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Incident Count](https://docs.camunda.org/manual/develop/reference/rest/history/incident/get-incident-query-count/)
     * method.
     *
     * @param GetHistoricIncidentsDto|null $queryDto
     * @return array<HistoricIncidentDto>
     * @throws GuzzleException
     */
    public function getHistoricIncidents(GetHistoricIncidentsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/incident", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricIncidentDto::class . '[]');
    }

    /**
     * Get Incident Count
     *
     * Queries for the number of historic incidents that fulfill the given parameters.
     * Takes the same parameters as the
     * [Get Incidents](https://docs.camunda.org/manual/develop/reference/rest/history/incident/get-incident-query/)
     * method.
     *
     * @param GetHistoricIncidentsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricIncidentsCount(GetHistoricIncidentsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/incident/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }
}