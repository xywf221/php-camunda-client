<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class TaskIdentityLink extends BaseClient
{
    /**
     * Get List
     *
     * Gets the identity links for a task by id, which are the users and groups that are in
     *some* relation to it (including assignee and owner).
     *
     * @param string $id
     * @param GetIdentityLinksDto|null $queryDto
     * @return array<IdentityLinkDto>
     * @throws GuzzleException
     */
    public function getIdentityLinks(string $id, GetIdentityLinksDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/task/$id/identity-links", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, IdentityLinkDto::class . '[]');
    }

    /**
     * Add
     *
     * Adds an identity link to a task by id. Can be used to link any user or group to a task
     * and specify a relation.
     *
     * @param string $id
     * @param IdentityLinkDto $bodyDto
     * @throws GuzzleException
     */
    public function addIdentityLink(string $id, IdentityLinkDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/identity-links", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete
     *
     * Removes an identity link from a task by id
     *
     * @param string $id
     * @param IdentityLinkDto $bodyDto
     * @throws GuzzleException
     */
    public function deleteIdentityLink(string $id, IdentityLinkDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/identity-links/delete", [
            'json' => $bodyDto->properties(),
        ]);
    }
}