<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricIdentityLinkLog extends BaseClient
{
    /**
     * Get Identity Link Logs
     *
     * Queries for historic identity link logs that fulfill given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Identity-Link-Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/identity-links/get-identity-link-query-count/)
     * method.
     *
     * @param GetHistoricIdentityLinksDto|null $queryDto
     * @return array<HistoricIdentityLinkLogDto>
     * @throws GuzzleException
     */
    public function getHistoricIdentityLinks(GetHistoricIdentityLinksDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/identity-link-log", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricIdentityLinkLogDto::class . '[]');
    }

    /**
     * Get Identity Link Log Count
     *
     * Queries for the number of historic identity link logs that fulfill the given
     * parameters. Takes the same parameters as the
     * [Get Identity-Link-Logs](https://docs.camunda.org/manual/develop/reference/rest/history/identity-links/get-identity-link-query/)
     * method.
     *
     * @param GetHistoricIdentityLinksCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricIdentityLinksCount(GetHistoricIdentityLinksCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/identity-link-log/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }
}