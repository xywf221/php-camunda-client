<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Authorization extends BaseClient
{
    /**
     * Get Authorizations
     *
     * Queries for a list of authorizations using a list of parameters.
     * The size of the result set can be retrieved by using the
     * [Get Authorization Count](https://docs.camunda.org/manual/develop/reference/rest/authorization/get-query-count/) method.
     *
     * @param QueryAuthorizationsDto|null $queryDto
     * @return array<AuthorizationDto>
     * @throws GuzzleException
     */
    public function queryAuthorizations(QueryAuthorizationsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/authorization", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, AuthorizationDto::class . '[]');
    }

    /**
     * Authorization Resource Options
     *
     * The OPTIONS request allows you to check for the set of available operations that the currently
     * authenticated user can perform on the `/authorization` resource. Whether the user can perform an operation
     * or not may depend on various factors, including the users authorizations to interact with this
     * resource and the internal configuration of the process engine.
     *
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableOperationsAuthorization(): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/authorization", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Perform an Authorization Check
     *
     * Performs an authorization check for the currently authenticated user.
     *
     * @param IsUserAuthorizedDto $queryDto
     * @return AuthorizationCheckResultDto
     * @throws GuzzleException
     */
    public function isUserAuthorized(IsUserAuthorizedDto $queryDto): AuthorizationCheckResultDto
    {
        $response = $this->client->get("/engine-rest/authorization/check", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, AuthorizationCheckResultDto::class);
    }

    /**
     * Get Authorization Count
     *
     * Queries for authorizations using a list of parameters and retrieves the count.
     *
     * @param GetAuthorizationCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getAuthorizationCount(GetAuthorizationCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/authorization/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create a New Authorization
     *
     * Creates a new authorization.
     *
     * @param AuthorizationCreateDto $bodyDto
     * @return AuthorizationDto
     * @throws GuzzleException
     */
    public function createAuthorization(AuthorizationCreateDto $bodyDto): AuthorizationDto
    {
        $response = $this->client->post("/engine-rest/authorization/create", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, AuthorizationDto::class);
    }

    /**
     * Delete Authorization
     *
     * Deletes an authorization by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteAuthorization(string $id): void
    {
        $this->client->delete("/engine-rest/authorization/$id", [
        ]);
    }

    /**
     * Get Authorization
     *
     * Retrieves an authorization by id.
     *
     * @param string $id
     * @return AuthorizationDto
     * @throws GuzzleException
     */
    public function getAuthorization(string $id): AuthorizationDto
    {
        $response = $this->client->get("/engine-rest/authorization/$id", [
        ]);
        return $this->deserializeResponse($response, AuthorizationDto::class);
    }

    /**
     * Authorization Resource Options
     *
     * The OPTIONS request allows you to check for the set of available operations that the currently
     * authenticated user can perform on a given instance of the `/authorization` resource.
     * Whether the user can perform an operation or not may depend on various factors, including the users
     * authorizations to interact with this resource and the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableOperationsAuthorizationInstance(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/authorization/$id", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Update an Authorization
     *
     * Updates an authorization by id.
     *
     * @param string $id
     * @param AuthorizationUpdateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateAuthorization(string $id, AuthorizationUpdateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/authorization/$id", [
            'json' => $bodyDto->properties(),
        ]);
    }
}