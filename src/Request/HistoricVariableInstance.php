<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricVariableInstance extends BaseClient
{
    /**
     * Get Variable Instances
     *
     * Queries for historic variable instances that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Variable Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/variable-instance/get-variable-instance-query-count/)
     * method.
     *
     * @param GetHistoricVariableInstancesDto|null $queryDto
     * @return array<HistoricVariableInstanceDto>
     * @throws GuzzleException
     */
    public function getHistoricVariableInstances(GetHistoricVariableInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/variable-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricVariableInstanceDto::class . '[]');
    }

    /**
     * Get Variable Instances (POST)
     *
     * Queries for historic variable instances that fulfill the given parameters.
     * This method is slightly more powerful than the
     * [Get Variable Instances](https://docs.camunda.org/manual/develop/reference/rest/history/variable-instance/get-variable-instance-query/)
     * method because it allows filtering by variable values of the different
     * types `String`, `Number` or `Boolean`.
     *
     * @param QueryHistoricVariableInstancesDto|null $queryDto
     * @param HistoricVariableInstanceQueryDto $bodyDto
     * @return array<HistoricVariableInstanceDto>
     * @throws GuzzleException
     */
    public function queryHistoricVariableInstances(QueryHistoricVariableInstancesDto $queryDto = null, HistoricVariableInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/variable-instance", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricVariableInstanceDto::class . '[]');
    }

    /**
     * Get Variable Instance Count
     *
     * Queries for the number of historic variable instances that fulfill the given
     * parameters.
     * Takes the same parameters as the
     * [Get Variable Instances](https://docs.camunda.org/manual/develop/reference/rest/history/variable-instance/get-variable-instance-query/)
     * method.
     *
     * @param GetHistoricVariableInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricVariableInstancesCount(GetHistoricVariableInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/variable-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Variable Instance Count (POST)
     *
     * Queries for historic variable instances that fulfill the given parameters.
     * This method takes the same message body as the
     * [Get Variable Instances (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/variable-instance/post-variable-instance-query/)
     * method and therefore it is more powerful regarding variable values
     * than the
     * [Get Variable Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/variable-instance/get-variable-instance-query-count/)
     * method.
     *
     * @param HistoricVariableInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricVariableInstancesCount(HistoricVariableInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/variable-instance/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete Variable Instance
     *
     * Deletes a historic variable instance by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteHistoricVariableInstance(string $id): void
    {
        $this->client->delete("/engine-rest/history/variable-instance/$id", [
        ]);
    }

    /**
     * Get Variable Instance
     *
     * Retrieves a historic variable by id.
     *
     * @param string $id
     * @param GetHistoricVariableInstanceDto|null $queryDto
     * @return HistoricVariableInstanceDto
     * @throws GuzzleException
     */
    public function getHistoricVariableInstance(string $id, GetHistoricVariableInstanceDto $queryDto = null): HistoricVariableInstanceDto
    {
        $response = $this->client->get("/engine-rest/history/variable-instance/$id", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricVariableInstanceDto::class);
    }

    /**
     * Get Variable Instance (Binary)
     *
     * Retrieves the content of a historic variable by id. Applicable for variables that
     * are serialized as binary data.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getHistoricVariableInstanceBinary(string $id): string
    {
        $response = $this->client->get("/engine-rest/history/variable-instance/$id/data", [
        ]);
        return $response->getBody()->getContents();
    }
}