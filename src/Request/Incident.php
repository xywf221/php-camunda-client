<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Incident extends BaseClient
{
    /**
     * Get List
     *
     * Queries for incidents that fulfill given parameters. The size of the result set can be retrieved by using
     * the [Get Incident Count](https://docs.camunda.org/manual/develop/reference/rest/incident/get-query-count/) method.
     *
     * @param GetIncidentsDto|null $queryDto
     * @return array<IncidentDto>
     * @throws GuzzleException
     */
    public function getIncidents(GetIncidentsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/incident", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, IncidentDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of incidents that fulfill given parameters. Takes the same parameters as the
     * [Get Incidents](https://docs.camunda.org/manual/develop/reference/rest/incident/get-query/) method.
     *
     * @param GetIncidentsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getIncidentsCount(GetIncidentsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/incident/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Resolve Incident
     *
     * Resolves an incident with given id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function resolveIncident(string $id): void
    {
        $this->client->delete("/engine-rest/incident/$id", [
        ]);
    }

    /**
     * Get Incident
     *
     * Retrieves an incident by ID.
     *
     * @param string $id
     * @return IncidentDto
     * @throws GuzzleException
     */
    public function getIncident(string $id): IncidentDto
    {
        $response = $this->client->get("/engine-rest/incident/$id", [
        ]);
        return $this->deserializeResponse($response, IncidentDto::class);
    }

    /**
     * Clear Incident Annotation
     *
     * Clears the annotation of an incident with given id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function clearIncidentAnnotation(string $id): void
    {
        $this->client->delete("/engine-rest/incident/$id/annotation", [
        ]);
    }

    /**
     * Set Incident Annotation
     *
     * Sets the annotation of an incident with given id.
     *
     * @param string $id
     * @param AnnotationDto $bodyDto
     * @throws GuzzleException
     */
    public function setIncidentAnnotation(string $id, AnnotationDto $bodyDto): void
    {
        $this->client->put("/engine-rest/incident/$id/annotation", [
            'json' => $bodyDto->properties(),
        ]);
    }
}