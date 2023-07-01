<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class DecisionRequirementsDefinition extends BaseClient
{
    /**
     * Get Decision Requirements Definitions
     *
     * Queries for decision requirements definitions that fulfill given parameters.
     * Parameters may be the properties of decision requirements definitions, such as the name,
     * key or version.  The size of the result set can be retrieved by using the
     * [Get Decision Requirements Definition Count](https://docs.camunda.org/manual/develop/reference/rest/decision-requirements-definition/get-query-count/)
     * method.
     *
     * @param GetDecisionRequirementsDefinitionsDto|null $queryDto
     * @return array<DecisionRequirementsDefinitionDto>
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitions(GetDecisionRequirementsDefinitionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionDto::class . '[]');
    }

    /**
     * Get Decision Requirements Definition Count
     *
     * Requests the number of decision requirements definitions that fulfill the query
     * criteria.
     * Takes the same filtering parameters as the
     * [Get Decision Requirements Definitions](https://docs.camunda.org/manual/develop/reference/rest/decision-requirements-definition/get-query/)
     * method.
     *
     * @param GetDecisionRequirementsDefinitionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionsCount(GetDecisionRequirementsDefinitionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get Decision Requirements Definition by Key
     *
     * Retrieves a decision requirements definition according to the
     * `DecisionRequirementsDefinition` interface in the engine.
     * Returns the latest version of the decision requirements definition
     * which belongs to no tenant.
     *
     * @param string $key
     * @return DecisionRequirementsDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionByKey(string $key): DecisionRequirementsDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionDto::class);
    }

    /**
     * Get Decision Requirements Diagram by Key
     *
     * Retrieves the diagram of a decision requirements definition.
     * Returns the diagram for the latest version of the decision requirements
     * definition which belongs to no tenant.
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDiagramByKey(string $key): string
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Decision Requirements Definition by Key and Tenant ID
     *
     * Retrieves a decision requirements definition according to the
     * `DecisionRequirementsDefinition` interface in the engine.
     * Returns the latest version of the decision requirements definition
     * for a tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @return DecisionRequirementsDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionByKeyAndTenantId(string $key, string $tenantId): DecisionRequirementsDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key/tenant-id/$tenantId", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionDto::class);
    }

    /**
     * Get Decision Requirements Diagram by Key and Tenant ID
     *
     * Retrieves the diagram of a decision requirements definition.
     * Returns the diagram of the latest version of the decision requirements
     * definition for a tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDiagramByKeyAndTenantId(string $key, string $tenantId): string
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key/tenant-id/$tenantId/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get DMN XML by Key and Tenant ID
     *
     * Retrieves the DMN XML of a decision requirements definition.
     * Returns the XML of the latest version of the decision requirements
     * definition for a tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @return DecisionRequirementsDefinitionXmlDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDmnXmlByKeyAndTenantId(string $key, string $tenantId): DecisionRequirementsDefinitionXmlDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key/tenant-id/$tenantId/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionXmlDto::class);
    }

    /**
     * Get DMN XML by Key
     *
     * Retrieves the DMN XML of a decision requirements definition.
     * Returns the XML for the latest version of the decision requirements
     * definition which belongs to no tenant.
     *
     * @param string $key
     * @return DecisionRequirementsDefinitionXmlDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDmnXmlByKey(string $key): DecisionRequirementsDefinitionXmlDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/key/$key/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionXmlDto::class);
    }

    /**
     * Get Decision Requirements Definition by ID
     *
     * Retrieves a decision requirements definition according to the
     * `DecisionRequirementsDefinition` interface in the engine.
     *
     * @param string $id
     * @return DecisionRequirementsDefinitionDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionById(string $id): DecisionRequirementsDefinitionDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/$id", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionDto::class);
    }

    /**
     * Get Decision Requirements Diagram by ID
     *
     * Retrieves the diagram of a decision requirements definition.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDiagramById(string $id): string
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/$id/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get DMN XML by ID
     *
     * Retrieves the DMN XML of a decision requirements definition.
     *
     * @param string $id
     * @return DecisionRequirementsDefinitionXmlDto
     * @throws GuzzleException
     */
    public function getDecisionRequirementsDefinitionDmnXmlById(string $id): DecisionRequirementsDefinitionXmlDto
    {
        $response = $this->client->get("/engine-rest/decision-requirements-definition/$id/xml", [
        ]);
        return $this->deserializeResponse($response, DecisionRequirementsDefinitionXmlDto::class);
    }
}