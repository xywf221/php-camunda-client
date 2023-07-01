<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Group extends BaseClient
{
    /**
     * Get List
     *
     * Queries for a list of groups using a list of parameters. The size of the result set can be retrieved
     * by using the [Get Group Count](https://docs.camunda.org/manual/develop/reference/rest/group/get-query-count) method.
     *
     * @param GetQueryGroupsDto|null $queryDto
     * @return array<GroupDto>
     * @throws GuzzleException
     */
    public function getQueryGroups(GetQueryGroupsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/group", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, GroupDto::class . '[]');
    }

    /**
     * Group Resource Options
     *
     * The `/group` resource supports two custom OPTIONS requests, this one for the resource as such and one for
     * individual group instances. The OPTIONS request allows checking for the set of available operations that
     * the currently authenticated user can perform on the `/group` resource. If the user can perform an operation
     * or not may depend on various things, including the users authorizations to interact with this resource and
     * the internal configuration of the process engine.
     *
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableGroupOperations(): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/group", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Get List (POST)
     *
     * Queries for a list of groups using a list of parameters.
     * The size of the result set can be retrieved by using the
     * [Get Group Count (POST)](https://docs.camunda.org/manual/develop/reference/rest/group/post-query-count/) method.
     *
     * @param PostQueryGroupsDto|null $queryDto
     * @param GroupQueryDto $bodyDto
     * @return array<GroupDto>
     * @throws GuzzleException
     */
    public function postQueryGroups(PostQueryGroupsDto $queryDto = null, GroupQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/group", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, GroupDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Queries for groups using a list of parameters and retrieves the count.
     *
     * @param GetGroupCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getGroupCount(GetGroupCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/group/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Queries for groups using a list of parameters and retrieves the count.
     *
     * @param GroupQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryGroupCount(GroupQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/group/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create Group
     *
     * Creates a new group.
     *
     * @param GroupDto $bodyDto
     * @throws GuzzleException
     */
    public function createGroup(GroupDto $bodyDto): void
    {
        $this->client->post("/engine-rest/group/create", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Group
     *
     * Deletes a group by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteGroup(string $id): void
    {
        $this->client->delete("/engine-rest/group/$id", [
        ]);
    }

    /**
     * Get Group
     *
     * Retrieves a group by id.
     *
     * @param string $id
     * @return GroupDto
     * @throws GuzzleException
     */
    public function getGroup(string $id): GroupDto
    {
        $response = $this->client->get("/engine-rest/group/$id", [
        ]);
        return $this->deserializeResponse($response, GroupDto::class);
    }

    /**
     * Group Resource Instance Options
     *
     * The `/group` resource supports two custom OPTIONS requests, one for the resource as such and this one for individual group instances.
     * The OPTIONS request allows checking for the set of available operations that the currently authenticated user can perform on the
     * `/group/{id}` resource instance. If the user can perform an operation or not may depend on various things, including the users authorizations
     * to interact with this resource and the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableGroupInstanceOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/group/$id", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Update Group
     *
     * Updates a given group by id.
     *
     * @param string $id
     * @param GroupDto $bodyDto
     * @throws GuzzleException
     */
    public function updateGroup(string $id, GroupDto $bodyDto): void
    {
        $this->client->put("/engine-rest/group/$id", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Group Membership Resource Options
     *
     * The OPTIONS request allows checking for the set of available operations that the currently authenticated
     * user can perform on the resource. If the user can perform an operation or not may depend on various
     * things, including the users authorizations to interact with this resource and the internal configuration
     * of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableGroupMembersOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/group/$id/members", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Delete a Group Member
     *
     * Removes a member from a group.
     *
     * @param string $id
     * @param string $userId
     * @throws GuzzleException
     */
    public function deleteGroupMember(string $id, string $userId): void
    {
        $this->client->delete("/engine-rest/group/$id/members/$userId", [
        ]);
    }

    /**
     * Create Group Member
     *
     * Adds a member to a group.
     *
     * @param string $id
     * @param string $userId
     * @throws GuzzleException
     */
    public function createGroupMember(string $id, string $userId): void
    {
        $this->client->put("/engine-rest/group/$id/members/$userId", [
        ]);
    }
}