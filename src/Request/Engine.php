<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Engine extends BaseClient
{
    /**
     * Get List
     *
     * Retrieves the names of all process engines available on your platform.
     **Note**: You cannot prepend `/engine/{name}` to this method.
     *
     * @return array<ProcessEngineDto>
     * @throws GuzzleException
     */
    public function getProcessEngineNames(): array
    {
        $response = $this->client->get("/engine-rest/engine", [
        ]);
        return $this->deserializeResponse($response, ProcessEngineDto::class . '[]');
    }
}