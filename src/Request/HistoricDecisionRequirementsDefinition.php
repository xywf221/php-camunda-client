<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricDecisionRequirementsDefinition extends BaseClient
{
    /**
     * Get DRD Statistics
     *
     * Retrieves evaluation statistics of a given decision requirements definition.
     *
     * @param string $id
     * @param GetDecisionStatisticsDto|null $queryDto
     * @return array<HistoricDecisionInstanceStatisticsDto>
     * @throws GuzzleException
     */
    public function getDecisionStatistics(string $id, GetDecisionStatisticsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/decision-requirements-definition/$id/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDecisionInstanceStatisticsDto::class . '[]');
    }
}