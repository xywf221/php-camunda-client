<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Modification extends BaseClient
{
    /**
     * Execute Modification
     *
     * Executes a modification synchronously for multiple process instances.
     * To modify a single process instance, use the
     * [Modify Process Instance Execution State](https://docs.camunda.org/manual/develop/reference/rest/process-instance/post-modification/) method.
     * To execute a modification asynchronously, use the
     * [Execute Modification Async (Batch)](https://docs.camunda.org/manual/develop/reference/rest/modification/post-modification-async/) method.
     *
     * For more information about the difference between synchronous and
     * asynchronous execution of a modification, please refer to the related
     * section of the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-migration.md#executing-a-migration-plan).
     *
     * @param ModificationDto $bodyDto
     * @throws GuzzleException
     */
    public function executeModification(ModificationDto $bodyDto): void
    {
        $this->client->post("/engine-rest/modification/execute", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Execute Modification Async (Batch)
     *
     * Executes a modification asynchronously for multiple process instances. To execute a
     * modification synchronously, use the
     * [Execute Modification](https://docs.camunda.org/manual/develop/reference/rest/modification/post-modification-sync/) method.
     *
     * For more information about the difference between synchronous and
     * asynchronous execution of a modification, please refer to the related
     * section of the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-migration.md#executing-a-migration-plan).
     *
     * @param ModificationDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function executeModificationAsync(ModificationDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/modification/executeAsync", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }
}