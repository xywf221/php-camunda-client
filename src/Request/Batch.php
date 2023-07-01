<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Batch extends BaseClient
{
    /**
     * Get List
     *
     * Queries for batches that fulfill given parameters. Parameters may be the properties of batches, such as the id or type.
     * The size of the result set can be retrieved by using the
     * [Get Batch Count](https://docs.camunda.org/manual/develop/reference/rest/batch/get-query-count/) method.
     *
     * @param GetBatchesDto|null $queryDto
     * @return array<BatchDto>
     * @throws GuzzleException
     */
    public function getBatches(GetBatchesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/batch", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Requests the number of batches that fulfill the query criteria.
     * Takes the same filtering parameters as the [Get Batches](https://docs.camunda.org/manual/develop/reference/rest/batch/get-query/) method.
     *
     * @param GetBatchesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getBatchesCount(GetBatchesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/batch/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Statistics
     *
     * Queries for batch statistics that fulfill given parameters.
     * Parameters may be the properties of batches, such as the id or type.
     * The size of the result set can be retrieved by using the
     * [Get Batch Statistics Count](https://docs.camunda.org/manual/develop/reference/rest/batch/get-statistics-query-count/) method.
     *
     * @param GetBatchStatisticsDto|null $queryDto
     * @return array<BatchStatisticsDto>
     * @throws GuzzleException
     */
    public function getBatchStatistics(GetBatchStatisticsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/batch/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, BatchStatisticsDto::class . '[]');
    }

    /**
     * Get Statistics Count
     *
     * Requests the number of batch statistics that fulfill the query criteria.
     * Takes the same filtering parameters as the
     * [Get Batch Statistics](https://docs.camunda.org/manual/develop/reference/rest/batch/get-statistics-query/) method.
     *
     * @param GetBatchStatisticsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getBatchStatisticsCount(GetBatchStatisticsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/batch/statistics/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete
     *
     * Deletes a batch by id, including all related jobs and job definitions.
     * Optionally also deletes the batch history.
     *
     * @param string $id
     * @param DeleteBatchDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteBatch(string $id, DeleteBatchDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/batch/$id", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves a batch by id, according to the Batch interface in the engine.
     *
     * @param string $id
     * @return BatchDto
     * @throws GuzzleException
     */
    public function getBatch(string $id): BatchDto
    {
        $response = $this->client->get("/engine-rest/batch/$id", [
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Activate/Suspend
     *
     * Activates or suspends a batch by id.
     *
     * @param string $id
     * @param SuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateBatchSuspensionState(string $id, SuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/batch/$id/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }
}