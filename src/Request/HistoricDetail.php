<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricDetail extends BaseClient
{
    /**
     * Get Historic Details
     *
     * Queries for historic details that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Historic Detail Count](https://docs.camunda.org/manual/develop/reference/rest/history/detail/get-detail-query-count/) method.
     *
     * @param GetHistoricDetailsDto|null $queryDto
     * @return array<HistoricDetailDto>
     * @throws GuzzleException
     */
    public function getHistoricDetails(GetHistoricDetailsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/detail", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDetailDto::class . '[]');
    }

    /**
     * Get Historic Details (POST)
     *
     * Queries for historic details that fulfill the given parameters. This method is slightly more
     * powerful than the [Get Historic Details](https://docs.camunda.org/manual/develop/reference/rest/history/detail/get-detail-query/)
     * method because it allows sorting by multiple parameters. The size of the result set can be retrieved by
     * using the [Get Historic Detail Count](https://docs.camunda.org/manual/develop/reference/rest/history/detail/get-detail-query-count/)
     * method.
     *
     * @param QueryHistoricDetailsDto|null $queryDto
     * @param HistoricDetailQueryDto $bodyDto
     * @return array<HistoricDetailDto>
     * @throws GuzzleException
     */
    public function queryHistoricDetails(QueryHistoricDetailsDto $queryDto = null, HistoricDetailQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/detail", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDetailDto::class . '[]');
    }

    /**
     * Get Historic Detail Count
     *
     * Queries for the number of historic details that fulfill the given parameters.
     * Takes the same parameters as the [Get Historic
     * Details](https://docs.camunda.org/manual/develop/reference/rest/history/detail/get-detail-query/)
     * method.
     *
     * @param GetHistoricDetailsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricDetailsCount(GetHistoricDetailsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/detail/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Historic Detail
     *
     * Retrieves a historic detail by id.
     *
     * @param string $id
     * @param HistoricDetailDto|null $queryDto
     * @return HistoricDetailDto
     * @throws GuzzleException
     */
    public function historicDetail(string $id, HistoricDetailDto $queryDto = null): HistoricDetailDto
    {
        $response = $this->client->get("/engine-rest/history/detail/$id", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricDetailDto::class);
    }

    /**
     * Get Historic Detail (Binary)
     *
     * Retrieves the content of a historic variable update by id. Applicable for byte
     * array and file variables.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function historicDetailBinary(string $id): string
    {
        $response = $this->client->get("/engine-rest/history/detail/$id/data", [
        ]);
        return $response->getBody()->getContents();
    }
}