<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Version extends BaseClient
{
    /**
     * Get Rest API version
     *
     * Retrieves the version of the Rest API.
     *
     * @return VersionDto
     * @throws GuzzleException
     */
    public function getRestAPIVersion(): VersionDto
    {
        $response = $this->client->get("/engine-rest/version", [
        ]);
        return $this->deserializeResponse($response, VersionDto::class);
    }
}