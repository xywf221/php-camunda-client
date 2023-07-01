<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricBatch extends BaseClient
{
    /**
     * Get Historic Batches
     *
     * Queries for historic batches that fulfill given parameters. Parameters may be
     * the properties of batches, such as the id or type. The
     * size of the result set can be retrieved by using the
     * [Get Historic Batch Count](https://docs.camunda.org/manual/develop/reference/rest/history/batch/get-query-count/)
     * method.
     *
     * @param GetHistoricBatchesDto|null $queryDto
     * @return array<HistoricBatchDto>
     * @throws GuzzleException
     */
    public function getHistoricBatches(GetHistoricBatchesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/batch", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricBatchDto::class . '[]');
    }

    /**
     * Get Cleanable Batch Report
     *
     * Retrieves a report about a historic batch operations relevant to history cleanup
     * (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)
     * ) so that you can tune the history time to live.
     * These reports include the count of the finished batches, cleanable
     * batches and type of the batch.
     * The size of the result set can be retrieved by using the
     * [Get Cleanable Batch Report Count](https://docs.camunda.org/manual/develop/reference/rest/history/batch/get-cleanable-batch-report-count/)
     * method.
     **Please note:**
     * The history time to live for batch operations does not support [Multi-Tenancy](https://docs.camunda.org/manual/develop/user-guide/process-engine/multi-tenancy.md).
     * The report will return an information for all batch operations (for all tenants) if you have permissions
     * to see the history.
     *
     * @param GetCleanableHistoricBatchesReportDto|null $queryDto
     * @return array<CleanableHistoricBatchReportResultDto>
     * @throws GuzzleException
     */
    public function getCleanableHistoricBatchesReport(GetCleanableHistoricBatchesReportDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/batch/cleanable-batch-report", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CleanableHistoricBatchReportResultDto::class . '[]');
    }

    /**
     * Get Cleanable Batch Report Count
     *
     * Queries for the number of report results about a historic batch operations relevant
     * to history cleanup (see
     * [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup)
     * ).
     * Takes the same parameters as the
     * [Get Cleanable Batch Report](https://docs.camunda.org/manual/develop/reference/rest/history/batch/get-cleanable-batch-report/)
     * method.
     *
     * @param GetCleanableHistoricBatchesReportCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getCleanableHistoricBatchesReportCount(GetCleanableHistoricBatchesReportCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/batch/cleanable-batch-report/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Historic Batch Count
     *
     * Requests the number of historic batches that fulfill the query criteria.
     * Takes the same filtering parameters as the
     * [Get Historic Batches](https://docs.camunda.org/manual/develop/reference/rest/history/batch/get-query/)
     * method.
     *
     * @param GetHistoricBatchesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricBatchesCount(GetHistoricBatchesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/batch/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Set Removal Time Async (POST)
     *
     * Sets the removal time to multiple historic batches asynchronously (batch).
     *
     * At least __historicBatchIds__ or __historicBatchQuery__ has to be
     * provided. If both are provided,
     * all instances matching query criterion and instances from the list
     * will be updated with a removal time.
     *
     * @param SetRemovalTimeToHistoricBatchesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setRemovalTimeAsyncHistoricBatch(SetRemovalTimeToHistoricBatchesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/history/batch/set-removal-time", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Delete Historic Batch
     *
     * Deletes a historic batch by id, including related historic job logs.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteHistoricBatch(string $id): void
    {
        $this->client->delete("/engine-rest/history/batch/$id", [
        ]);
    }

    /**
     * Get Historic Batch
     *
     * Retrieves a historic batch by id, according to the `HistoricBatch` interface in the
     * engine.
     *
     * @param string $id
     * @return HistoricBatchDto
     * @throws GuzzleException
     */
    public function getHistoricBatch(string $id): HistoricBatchDto
    {
        $response = $this->client->get("/engine-rest/history/batch/$id", [
        ]);
        return $this->deserializeResponse($response, HistoricBatchDto::class);
    }
}