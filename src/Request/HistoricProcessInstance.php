<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricProcessInstance extends BaseClient
{
    /**
     * Get List
     *
     * Queries for historic process instances that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get Process Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/process-instance/get-process-instance-query-count/) method.
     *
     * @param GetHistoricProcessInstancesDto|null $queryDto
     * @return array<HistoricProcessInstanceDto>
     * @throws GuzzleException
     */
    public function getHistoricProcessInstances(GetHistoricProcessInstancesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/process-instance", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricProcessInstanceDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for historic process instances that fulfill the given parameters.
     * This method is slightly more powerful than the
     * [Get Process Instance](https://docs.camunda.org/manual/develop/reference/rest/history/process-instance/get-process-instance-query/)
     * because it allows filtering by multiple process variables of types `String`, `Number` or `Boolean`.
     *
     * @param QueryHistoricProcessInstancesDto|null $queryDto
     * @param HistoricProcessInstanceQueryDto $bodyDto
     * @return array<HistoricProcessInstanceDto>
     * @throws GuzzleException
     */
    public function queryHistoricProcessInstances(QueryHistoricProcessInstancesDto $queryDto = null, HistoricProcessInstanceQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/history/process-instance", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, HistoricProcessInstanceDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of historic process instances that fulfill the given parameters.
     * Takes the same parameters as the [Get Process Instances](https://docs.camunda.org/manual/develop/reference/rest/history/process-instance/get-process-instance-query/) method.
     *
     * @param GetHistoricProcessInstancesCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getHistoricProcessInstancesCount(GetHistoricProcessInstancesCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/process-instance/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Queries for the number of historic process instances that fulfill the given parameters.
     * This method takes the same message body as the [Get Process Instances (POST)](https://docs.camunda.org/manual/develop/reference/rest/history/process-instance/get-process-instance-query/) method and
     * therefore it is slightly more powerful than the [Get Process Instance Count](https://docs.camunda.org/manual/develop/reference/rest/history/process-instance/post-process-instance-query-count/) method.
     *
     * @param HistoricProcessInstanceQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryHistoricProcessInstancesCount(HistoricProcessInstanceQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/history/process-instance/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete Async (POST)
     *
     * Delete multiple historic process instances asynchronously (batch).
     * At least `historicProcessInstanceIds` or `historicProcessInstanceQuery` has to be provided.
     * If both are provided then all instances matching query criterion and instances from the list will be deleted.
     *
     * @param DeleteHistoricProcessInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function deleteHistoricProcessInstancesAsync(DeleteHistoricProcessInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/history/process-instance/delete", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Get Duration Report
     *
     * Retrieves a report about the duration of completed process instances, grouped by a period.
     * These reports include the maximum, minimum and average duration of all completed process instances which were started in a given period.
     **Note:** This only includes historic data.
     *
     * @param GetHistoricProcessInstanceDurationReportDto $queryDto
     * @return array<DurationReportResultDto>
     * @throws GuzzleException
     */
    public function getHistoricProcessInstanceDurationReport(GetHistoricProcessInstanceDurationReportDto $queryDto): array
    {
        $response = $this->client->get("/engine-rest/history/process-instance/report", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, DurationReportResultDto::class . '[]');
    }

    /**
     * Set Removal Time Async (POST)
     *
     * Sets the removal time to multiple historic process instances asynchronously (batch).
     *
     * At least `historicProcessInstanceIds` or `historicProcessInstanceQuery` has to be provided.
     * If both are provided, all instances matching query criterion and instances from the list will be updated with a removal time.
     *
     * @param SetRemovalTimeToHistoricProcessInstancesDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function setRemovalTimeAsync(SetRemovalTimeToHistoricProcessInstancesDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/history/process-instance/set-removal-time", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Delete
     *
     * Deletes a process instance from the history by id.
     *
     * @param string $id
     * @param DeleteHistoricProcessInstanceDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteHistoricProcessInstance(string $id, DeleteHistoricProcessInstanceDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/history/process-instance/$id", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves a historic process instance by id, according to the `HistoricProcessInstance` interface in the engine.
     *
     * @param string $id
     * @return HistoricProcessInstanceDto
     * @throws GuzzleException
     */
    public function getHistoricProcessInstance(string $id): HistoricProcessInstanceDto
    {
        $response = $this->client->get("/engine-rest/history/process-instance/$id", [
        ]);
        return $this->deserializeResponse($response, HistoricProcessInstanceDto::class);
    }

    /**
     * Delete Variable Instances
     *
     * Deletes all variables of a process instance from the history by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteHistoricVariableInstancesOfHistoricProcessInstance(string $id): void
    {
        $this->client->delete("/engine-rest/history/process-instance/$id/variable-instances", [
        ]);
    }
}