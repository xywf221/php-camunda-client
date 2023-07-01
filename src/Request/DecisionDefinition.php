<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use Camunda\Dto\DecisionDefinitionDiagramDto;
use Camunda\Dto\DecisionDefinitionDto;
use Camunda\Dto\EvaluateDecisionDto;
use Camunda\Dto\HistoryTimeToLiveDto;
use Camunda\Dto\VariableValueDto;
use GuzzleHttp\Exception\GuzzleException;

class DecisionDefinition extends BaseClient
{
    /**
     * Get List
     *
     * Queries for decision definitions that fulfill given parameters.
     * Parameters may be the properties of decision definitions, such as the name, key or version.
     * The size of the result set can be retrieved by using
     * the [Get Decision Definition Count](https://docs.camunda.org/manual/develop/reference/rest/decision-definition/get-query-count/) method.
     *
     * @param GetDecisionDefinitionsDto|null $queryDto
     * @return array<DecisionDefinitionDto>
     * @throws GuzzleException
     */
    public function getDecisionDefinitions(GetDecisionDefinitionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/decision-definition", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Requests the number of decision definitions that fulfill the query criteria.
     * Takes the same filtering parameters as the
     * [Get Decision Definition](https://docs.camunda.org/manual/develop/reference/rest/decision-definition/get-query/) method.
     *
     * @param GetDecisionDefinitionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionsCount(GetDecisionDefinitionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Decision Definition By Key
     *
     * Retrieves the latest version of the decision definition which belongs to no tenant.
     *
     * @param string $key
     * @return DecisionDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionByKey(string $key): DecisionDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDto::class);
    }

    /**
     * Get Diagram By Key
     *
     * Returns the diagram for the latest version of the decision definition which belongs to no tenant
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDiagramByKey(string $key): string
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Evaluate By Key
     *
     * Evaluates the latest version of the decision definition which belongs to no tenant.
     * The input values of the decision have to be supplied in the request body.
     *
     * @param string $key
     * @param EvaluateDecisionDto $bodyDto
     * @return array<>
     * @throws GuzzleException
     */
    public function evaluateDecisionByKey(string $key, EvaluateDecisionDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/decision-definition/key/$key/evaluate", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class . '[]');
    }

    /**
     * Update History Time to Live By Key
     *
     * Updates the latest version of the decision definition which belongs to no tenant.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $key
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByDecisionDefinitionKey(string $key, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/decision-definition/key/$key/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Decision Definition By Key And Tenant Id
     *
     * Retrieves the latest version of the decision definition for tenant
     *
     * @param string $key
     * @param string $tenantId
     * @return DecisionDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionByKeyAndTenantId(string $key, string $tenantId): DecisionDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key/tenant-id/$tenantId", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDto::class);
    }

    /**
     * Get Diagram By Key And Tenant
     *
     * Returns the XML of the latest version of the decision definition for tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDiagramByKeyAndTenant(string $key, string $tenantId): string
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key/tenant-id/$tenantId/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Evaluate By Key And Tenant
     *
     * Evaluates the latest version of the decision definition for tenant.
     * The input values of the decision have to be supplied in the request body.
     *
     * @param string $key
     * @param string $tenantId
     * @param EvaluateDecisionDto $bodyDto
     * @return array<>
     * @throws GuzzleException
     */
    public function evaluateDecisionByKeyAndTenant(string $key, string $tenantId, EvaluateDecisionDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/decision-definition/key/$key/tenant-id/$tenantId/evaluate", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class . '[]');
    }

    /**
     * Update History Time to Live By Key And Tenant
     *
     * Updates the latest version of the decision definition for tenant.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $key
     * @param string $tenantId
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByDecisionDefinitionKeyAndTenant(string $key, string $tenantId, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/decision-definition/key/$key/tenant-id/$tenantId/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get XML By Key and Tenant
     *
     * Retrieves the XML of the latest version of the decision definition for tenant
     *
     * @param string $key
     * @param string $tenantId
     * @return DecisionDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDmnXmlByKeyAndTenant(string $key, string $tenantId): DecisionDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key/tenant-id/$tenantId/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDiagramDto::class);
    }

    /**
     * Get XML By Key
     *
     * Retrieves the XML for the latest version of the decision definition which belongs to no tenant.
     *
     * @param string $key
     * @return DecisionDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDmnXmlByKey(string $key): DecisionDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/key/$key/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDiagramDto::class);
    }

    /**
     * Get Decision Definition By Id
     *
     * Retrieves a decision definition by id, according to the `DecisionDefinition` interface in the engine.
     *
     * @param string $id
     * @return DecisionDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionById(string $id): DecisionDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/$id", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDto::class);
    }

    /**
     * Get Diagram
     *
     * Retrieves the diagram of a decision definition.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDiagram(string $id): string
    {
        $response = $this->client->get("/engine-rest/decision-definition/$id/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Evaluate By Id
     *
     * Evaluates a given decision and returns the result.
     * The input values of the decision have to be supplied in the request body.
     *
     * @param string $id
     * @param EvaluateDecisionDto $bodyDto
     * @return array<>
     * @throws GuzzleException
     */
    public function evaluateDecisionById(string $id, EvaluateDecisionDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/decision-definition/$id/evaluate", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class . '[]');
    }

    /**
     * Update History Time to Live
     *
     * Updates history time to live for decision definition.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $id
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByDecisionDefinitionId(string $id, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/decision-definition/$id/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get XML By Id
     *
     * Retrieves the DMN XML of a decision definition.
     *
     * @param string $id
     * @return DecisionDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getDecisionDefinitionDmnXmlById(string $id): DecisionDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/decision-definition/$id/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionDefinitionDiagramDto::class);
    }
}