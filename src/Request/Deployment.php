<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use Camunda\Dto\CountResultDto;
use Camunda\Dto\DeleteDeploymentDto;
use Camunda\Dto\DeploymentDto;
use Camunda\Dto\DeploymentResourceDto;
use Camunda\Dto\DeploymentWithDefinitionsDto;
use Camunda\Dto\GetDeploymentsCountDto;
use Camunda\Dto\GetDeploymentsDto;
use Camunda\Dto\MultiFormDeploymentDto;
use Camunda\Dto\RedeploymentDto;
use GuzzleHttp\Exception\GuzzleException;

class Deployment extends BaseClient
{
    /**
     * Get List
     *
     * Queries for deployments that fulfill given parameters. Parameters may be the properties of deployments,
     * such as the id or name or a range of the deployment time. The size of the result set can be retrieved by
     * using the [Get Deployment count](https://docs.camunda.org/manual/develop/reference/rest/deployment/get-query-count/) method.
     *
     * @param GetDeploymentsDto|null $queryDto
     * @return array<DeploymentDto>
     * @throws GuzzleException
     */
    public function getDeployments(GetDeploymentsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/deployment", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, DeploymentDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for the number of deployments that fulfill given parameters. Takes the same parameters as the
     * [Get Deployments](https://docs.camunda.org/manual/develop/reference/rest/deployment/get-query/) method.
     *
     * @param GetDeploymentsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getDeploymentsCount(GetDeploymentsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/deployment/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create
     *
     * Creates a deployment.
     **Security Consideration**
     *
     * Deployments can contain custom code in form of scripts or EL expressions to customize process behavior.
     * This may be abused for remote execution of arbitrary code.
     *
     * @param MultiFormDeploymentDto $bodyDto
     * @return DeploymentWithDefinitionsDto
     * @throws GuzzleException
     */
    public function createDeployment(MultiFormDeploymentDto $bodyDto): DeploymentWithDefinitionsDto
    {
        $response = $this->client->post("/engine-rest/deployment/create", [
            'multipart' => $bodyDto->multipart(),
        ]);
        return $this->deserializeResponse($response, DeploymentWithDefinitionsDto::class);
    }

    /**
     * Get Registered Deployments
     *
     * Queries the registered deployment IDs for the current application.
     *
     * @return array<string>
     * @throws GuzzleException
     */
    public function getRegisteredDeployments(): array
    {
        $response = $this->client->get("/engine-rest/deployment/registered", [
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Delete
     *
     * Deletes a deployment by id.
     *
     * @param string $id
     * @param DeleteDeploymentDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteDeployment(string $id, DeleteDeploymentDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/deployment/$id", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves a deployment by id, according to the `Deployment` interface of the engine.
     *
     * @param string $id
     * @return DeploymentDto
     * @throws GuzzleException
     */
    public function getDeployment(string $id): DeploymentDto
    {
        $response = $this->client->get("/engine-rest/deployment/$id", [
        ]);
        return $this->deserializeResponse($response, DeploymentDto::class);
    }

    /**
     * Redeploy
     *
     * Re-deploys an existing deployment.
     *
     * The deployment resources to re-deploy can be restricted by using the properties `resourceIds` or
     * `resourceNames`. If no deployment resources to re-deploy are passed then all existing resources of the
     * given deployment are re-deployed.
     **Warning**: Deployments can contain custom code in form of scripts or EL expressions to customize
     * process behavior. This may be abused for remote execution of arbitrary code. See the section on
     * [security considerations for custom code](https://docs.camunda.org/manual/develop/user-guide/process-engine/securing-custom-code/) in
     * the user guide for details.
     *
     * @param string $id
     * @param RedeploymentDto $bodyDto
     * @return DeploymentWithDefinitionsDto
     * @throws GuzzleException
     */
    public function redeploy(string $id, RedeploymentDto $bodyDto): DeploymentWithDefinitionsDto
    {
        $response = $this->client->post("/engine-rest/deployment/$id/redeploy", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, DeploymentWithDefinitionsDto::class);
    }

    /**
     * Get Resources
     *
     * Retrieves all deployment resources of a given deployment.
     *
     * @param string $id
     * @return array<DeploymentResourceDto>
     * @throws GuzzleException
     */
    public function getDeploymentResources(string $id): array
    {
        $response = $this->client->get("/engine-rest/deployment/$id/resources", [
        ]);
        return $this->deserializeResponse($response, DeploymentResourceDto::class . '[]');
    }

    /**
     * Get Resource
     *
     * Retrieves a deployment resource by resource id for the given deployment.
     *
     * @param string $id
     * @param string $resourceId
     * @return DeploymentResourceDto
     * @throws GuzzleException
     */
    public function getDeploymentResource(string $id, string $resourceId): DeploymentResourceDto
    {
        $response = $this->client->get("/engine-rest/deployment/$id/resources/$resourceId", [
        ]);
        return $this->deserializeResponse($response, DeploymentResourceDto::class);
    }

    /**
     * Get Resource (Binary)
     *
     * Retrieves the binary content of a deployment resource for the given deployment by id.
     *
     * @param string $id
     * @param string $resourceId
     * @return string
     * @throws GuzzleException
     */
    public function getDeploymentResourceData(string $id, string $resourceId): string
    {
        $response = $this->client->get("/engine-rest/deployment/$id/resources/$resourceId/data", [
        ]);
        return $response->getBody()->getContents();
    }
}