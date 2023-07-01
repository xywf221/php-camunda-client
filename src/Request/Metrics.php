<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Metrics extends BaseClient
{
    /**
     * Get Metrics in Interval
     *
     * Retrieves a list of metrics, aggregated for a given interval.
     *
     * @param IntervalDto|null $queryDto
     * @return array<MetricsIntervalResultDto>
     * @throws GuzzleException
     */
    public function interval(IntervalDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/metrics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, MetricsIntervalResultDto::class . '[]');
    }

    /**
     * Delete Task Worker Metrics
     *
     * Deletes all task worker metrics prior to the given date or all if no date is provided.
     *
     * @param DeleteTaskMetricsDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteTaskMetrics(DeleteTaskMetricsDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/metrics/task-worker", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get Sum
     *
     * Retrieves the `sum` (count) for a given metric.
     *
     * @param string $metricsName
     * @param GetMetricsDto|null $queryDto
     * @return MetricsResultDto
     * @throws GuzzleException
     */
    public function getMetrics(string $metricsName, GetMetricsDto $queryDto = null): MetricsResultDto
    {
        $response = $this->client->get("/engine-rest/metrics/$metricsName/sum", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, MetricsResultDto::class);
    }
}