<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Tenant extends BaseClient
{
    /**
     * Get Tenants
     *
     * Query for a list of tenants using a list of parameters. The size of the result set
     * can be retrieved by using the [Get Tenant
     * Count](https://docs.camunda.org/manual/develop/reference/rest/tenant/get-query-count/) method.
     *
     * @param QueryTenantsDto|null $queryDto
     * @return array<TenantDto>
     * @throws GuzzleException
     */
    public function queryTenants(QueryTenantsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/tenant", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, TenantDto::class . '[]');
    }

    /**
     * Tenant Resource Options
     *
     * The `/tenant` resource supports two custom OPTIONS requests, this one for the resource
     * as such and one for individual tenant instances. The OPTIONS request
     * allows checking for the set of available operations that the currently
     * authenticated user can perform on the `/tenant` resource. If the user
     * can perform an operation or not may depend on various things,
     * including the users authorizations to interact with this resource and
     * the internal configuration of the process engine.
     *
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableTenantResourceOperations(): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/tenant", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Get Tenant Count
     *
     * Query for tenants using a list of parameters and retrieves the count.
     *
     * @param GetTenantCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getTenantCount(GetTenantCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/tenant/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create Tenant
     *
     * Create a new tenant.
     *
     * @param TenantDto $bodyDto
     * @throws GuzzleException
     */
    public function createTenant(TenantDto $bodyDto): void
    {
        $this->client->post("/engine-rest/tenant/create", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Tenant
     *
     * Deletes a tenant by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteTenant(string $id): void
    {
        $this->client->delete("/engine-rest/tenant/$id", [
        ]);
    }

    /**
     * Get Tenant
     *
     * Retrieves a tenant.
     *
     * @param string $id
     * @return TenantDto
     * @throws GuzzleException
     */
    public function getTenant(string $id): TenantDto
    {
        $response = $this->client->get("/engine-rest/tenant/$id", [
        ]);
        return $this->deserializeResponse($response, TenantDto::class);
    }

    /**
     * Tenant Resource Options
     *
     * The `/tenant` resource supports two custom OPTIONS requests, one for the resource as such and this one for
     * individual tenant instances. The OPTIONS request allows checking for the set of available operations that
     * the currently authenticated user can perform on the `/tenant/{id}` resource. If the user can perform an
     * operation or not may depend on various things, including the users authorizations to interact with this
     * resource and the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableTenantInstanceOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/tenant/$id", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Update Tenant
     *
     * Updates a given tenant.
     *
     * @param string $id
     * @param TenantDto $bodyDto
     * @throws GuzzleException
     */
    public function updateTenant(string $id, TenantDto $bodyDto): void
    {
        $this->client->put("/engine-rest/tenant/$id", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Tenant Group Membership Resource Options
     *
     * The OPTIONS request allows checking for the set of available operations that the
     * currently authenticated user can perform on the resource. If the user
     * can perform an operation or not may depend on various things,
     * including the users authorizations to interact with this resource and
     * the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableTenantGroupMembersOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/tenant/$id/group-members", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Create Tenant Group Membership
     *
     * Creates a membership between a tenant and a group.
     *
     * @param string $id
     * @param string $groupId
     * @throws GuzzleException
     */
    public function deleteGroupMembership(string $id, string $groupId): void
    {
        $this->client->delete("/engine-rest/tenant/$id/group-members/$groupId", [
        ]);
    }

    /**
     * Create Tenant Group Membership
     *
     * Creates a membership between a tenant and a group.
     *
     * @param string $id
     * @param string $groupId
     * @throws GuzzleException
     */
    public function createGroupMembership(string $id, string $groupId): void
    {
        $this->client->put("/engine-rest/tenant/$id/group-members/$groupId", [
        ]);
    }

    /**
     * Tenant User Membership Resource Options
     *
     * The OPTIONS request allows checking for the set of available operations that the
     * currently authenticated user can perform on the resource. If the user
     * can perform an operation or not may depend on various things,
     * including the users authorizations to interact with this resource and
     * the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function availableTenantUserMembersOperations(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/tenant/$id/user-members", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Delete a Tenant User Membership
     *
     * Deletes a membership between a tenant and an user.
     *
     * @param string $id
     * @param string $userId
     * @throws GuzzleException
     */
    public function deleteUserMembership(string $id, string $userId): void
    {
        $this->client->delete("/engine-rest/tenant/$id/user-members/$userId", [
        ]);
    }

    /**
     * Create Tenant User Membership
     *
     * Creates a membership between a tenant and an user.
     *
     * @param string $id
     * @param string $userId
     * @throws GuzzleException
     */
    public function createUserMembership(string $id, string $userId): void
    {
        $this->client->put("/engine-rest/tenant/$id/user-members/$userId", [
        ]);
    }
}