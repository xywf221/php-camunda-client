<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class User extends BaseClient
{
    /**
     * Get List
     *
     * Query for a list of users using a list of parameters.
     * The size of the result set can be retrieved by using the Get User Count method.
     * [Get User Count](https://docs.camunda.org/manual/develop/reference/rest/user/get-query-count/) method.
     *
     * @param GetUsersDto|null $queryDto
     * @return array<UserProfileDto>
     * @throws GuzzleException
     */
    public function getUsers(GetUsersDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/user", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, UserProfileDto::class . '[]');
    }

    /**
     * Options
     *
     * The `/user` resource supports two custom `OPTIONS` requests, one for the resource as such
     * and one for individual user instances. The `OPTIONS` request allows checking for the set of
     * available operations that the currently authenticated user can perform on the /user resource.
     * If the user can perform an operation or not may depend on various things, including the user&#039;s
     * authorizations to interact with this resource and the internal configuration of the process
     * engine. `OPTIONS /user` returns available interactions on the resource.
     *
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableOperations(): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/user", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Get List Count
     *
     * Queries for the number of deployments that fulfill given parameters. Takes the same parameters as the
     * [Get Users](https://docs.camunda.org/manual/develop/reference/rest/user/get-query/) method.
     *
     * @param GetUserCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getUserCount(GetUserCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/user/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create
     *
     * Create a new user.
     *
     * @param UserDto $bodyDto
     * @throws GuzzleException
     */
    public function createUser(UserDto $bodyDto): void
    {
        $this->client->post("/engine-rest/user/create", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete
     *
     * Deletes a user by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteUser(string $id): void
    {
        $this->client->delete("/engine-rest/user/$id", [
        ]);
    }

    /**
     * Options
     *
     * The `/user` resource supports two custom `OPTIONS` requests, one for the resource as such
     * and one for individual user instances. The `OPTIONS` request allows checking for the set of
     * available operations that the currently authenticated user can perform on the /user resource.
     * If the user can perform an operation or not may depend on various things, including the user&#039;s
     * authorizations to interact with this resource and the internal configuration of the process
     * engine. `OPTIONS /user/{id}` returns available interactions on a resource instance.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableUserOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/user/$id", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Update Credentials
     *
     * Updates a user&#039;s credentials (password)
     *
     * @param string $id
     * @param UserCredentialsDto $bodyDto
     * @throws GuzzleException
     */
    public function updateCredentials(string $id, UserCredentialsDto $bodyDto): void
    {
        $this->client->put("/engine-rest/user/$id/credentials", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Profile
     *
     * Retrieves a user&#039;s profile.
     *
     * @param string $id
     * @return UserProfileDto
     * @throws GuzzleException
     */
    public function getUserProfile(string $id): UserProfileDto
    {
        $response = $this->client->get("/engine-rest/user/$id/profile", [
        ]);
        return $this->deserializeResponse($response, UserProfileDto::class);
    }

    /**
     * Update User Profile
     *
     * Updates the profile information of an already existing user.
     *
     * @param string $id
     * @param UserProfileDto $bodyDto
     * @throws GuzzleException
     */
    public function updateProfile(string $id, UserProfileDto $bodyDto): void
    {
        $this->client->put("/engine-rest/user/$id/profile", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Unlock User
     *
     * Unlocks a user by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function unlockUser(string $id): void
    {
        $this->client->post("/engine-rest/user/$id/unlock", [
        ]);
    }
}