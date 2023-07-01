<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricActivityInstance extends BaseClient
{
    /**
     * Get List
     *
     * Queries for historic activity instances that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Historic Activity Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/activity-instance/get-activity-instance-query-count/) method.
     *
     * @param GetHistoricActivityInstancesDto|null $queryDto
     * @return array<HistoricActivityInstanceDto>
     * @throws GuzzleException
     */
    public function getHistoricActivityInstances(GetHistoricActivityInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/activity-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricActivityInstanceDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for historic activity instances that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Historic Activity Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/activity-instance/get-activity-instance-query-count/) method.
     *
     * @param QueryHistoricActivityInstancesDto|null $queryDto
     * @param HistoricActivityInstanceQueryDto $bodyDto
     * @return array<HistoricActivityInstanceDto>
     * @throws GuzzleException
     */
    public function queryHistoricActivityInstances(QueryHistoricActivityInstancesDto $queryDto = null, HistoricActivityInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/activity-instance", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricActivityInstanceDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of historic activity instances that fulfill the given parameters.
     * Takes the same parameters as the [Get Historic Activity Instance](https://docs.camunda.org/manual/develop/reference/rest/history/activity-instance/get-activity-instance-query/)  method.
     *
     * @param GetHistoricActivityInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricActivityInstancesCount(GetHistoricActivityInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/activity-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Queries for the number of historic activity instances that fulfill the given parameters.
     *
     * @param HistoricActivityInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricActivityInstancesCount(HistoricActivityInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/activity-instance/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get
     *
     * Retrieves a historic activity instance by id, according to the `HistoricActivityInstance` interface in the engine.
     *
     * @param string $id
     * @return HistoricActivityInstanceDto
     * @throws GuzzleException
     */
    public function getHistoricActivityInstance(string $id): HistoricActivityInstanceDto
    {
        $response = $this->client->get("/engine-rest/history/activity-instance/$id", [
        ]);
        return $this->deserializeResponse($response, HistoricActivityInstanceDto::class);
    }
}