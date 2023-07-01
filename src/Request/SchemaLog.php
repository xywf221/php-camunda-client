<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class SchemaLog extends BaseClient
{
    /**
     * Get List
     *
     * Queries for schema log entries that fulfill given parameters.
     *
     * @param GetSchemaLogDto|null $queryDto
     * @return array<SchemaLogEntryDto>
     * @throws GuzzleException
     */
    public function getSchemaLog(GetSchemaLogDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/schema/log", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, SchemaLogEntryDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for schema log entries that fulfill given parameters.
     *
     * @param QuerySchemaLogDto|null $queryDto
     * @param SchemaLogQueryDto $bodyDto
     * @return array<SchemaLogEntryDto>
     * @throws GuzzleException
     */
    public function querySchemaLog(QuerySchemaLogDto $queryDto = null, SchemaLogQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/schema/log", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, SchemaLogEntryDto::class . '[]');
    }
}