<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class VariableInstance extends BaseClient
{
    /**
     * Get Variable Instances
     *
     * Query for variable instances that fulfill given parameters. Parameters may be the
     * properties of variable instances, such as the name or type. The size
     * of the result set can be retrieved by using the [Get Variable Instance
     * Count](https://docs.camunda.org/manual/develop/reference/rest/variable-instance/get-query-count/)
     * method.
     *
     * @param GetVariableInstancesDto|null $queryDto
     * @return array<VariableInstanceDto>
     * @throws GuzzleException
     */
    public function getVariableInstances(GetVariableInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/variable-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableInstanceDto::class . '[]');
    }

    /**
     * Get Variable Instances (POST)
     *
     * Query for variable instances that fulfill given parameters through a JSON object.
     * This method is slightly more powerful than the
     * [Get Variable Instances](https://docs.camunda.org/manual/develop/reference/rest/variable-
     * instance/get-query/) method because it allows filtering by multiple
     * variable instances of types `String`, `Number` or `Boolean`.
     *
     * @param QueryVariableInstancesDto|null $queryDto
     * @param VariableInstanceQueryDto $bodyDto
     * @return array<VariableInstanceDto>
     * @throws GuzzleException
     */
    public function queryVariableInstances(QueryVariableInstancesDto $queryDto = null, VariableInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/variable-instance", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, VariableInstanceDto::class . '[]');
    }

    /**
     * Get Variable Instance Count
     *
     * Query for the number of variable instances that fulfill given parameters. Takes the
     * same parameters as the [Get Variable
     * Instances](https://docs.camunda.org/manual/develop/reference/rest/variable-instance/get-query/)
     * method.
     *
     * @param GetVariableInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getVariableInstancesCount(GetVariableInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/variable-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Variable Instance Count (POST)
     *
     * Query for the number of variable instances that fulfill given parameters. This
     * method takes the same message body as the
     * [Get Variable Instances POST](https://docs.camunda.org/manual/develop/reference/rest/variable-
     * instance/post-query/) method and therefore it is slightly more
     * powerful than the [Get Variable Instance
     * Count](https://docs.camunda.org/manual/develop/reference/rest/variable-instance/get-query-count/)
     * method.
     *
     * @param VariableInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryVariableInstancesCount(VariableInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/variable-instance/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Variable Instance
     *
     * Retrieves a variable by id.
     *
     * @param string $id
     * @param GetVariableInstanceDto|null $queryDto
     * @return VariableInstanceDto
     * @throws GuzzleException
     */
    public function getVariableInstance(string $id, GetVariableInstanceDto $queryDto = null): VariableInstanceDto
    {
        $response = $this->client->get("/engine-rest/variable-instance/$id", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableInstanceDto::class);
    }

    /**
     * Get Variable Instance (Binary)
     *
     * Retrieves the content of a variable by id. Applicable for byte array and file
     * variables.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getVariableInstanceBinary(string $id): string
    {
        $response = $this->client->get("/engine-rest/variable-instance/$id/data", [
        ]);
        return $response->getBody()->getContents();
    }
}