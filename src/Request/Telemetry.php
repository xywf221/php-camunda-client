<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Telemetry extends BaseClient
{
    /**
     * Fetch Telemetry Configuration
     *
     * Fetches Telemetry Configuration.
     *
     * @return TelemetryConfigurationDto
     * @throws GuzzleException
     */
    public function getTelemetryConfiguration(): TelemetryConfigurationDto
    {
        $response = $this->client->get("/engine-rest/telemetry/configuration", [
        ]);
        return $this->deserializeResponse($response, TelemetryConfigurationDto::class);
    }

    /**
     * Configure Telemetry
     *
     * Configures whether Camunda receives data collection of the process engine setup and usage.
     *
     * @param TelemetryConfigurationDto $bodyDto
     * @throws GuzzleException
     */
    public function configureTelemetry(TelemetryConfigurationDto $bodyDto): void
    {
        $this->client->post("/engine-rest/telemetry/configuration", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Fetch Telemetry Data
     *
     * Fetches Telemetry Data.
     *
     * @return TelemetryDataDto
     * @throws GuzzleException
     */
    public function getTelemetryData(): TelemetryDataDto
    {
        $response = $this->client->get("/engine-rest/telemetry/data", [
        ]);
        return $this->deserializeResponse($response, TelemetryDataDto::class);
    }
}