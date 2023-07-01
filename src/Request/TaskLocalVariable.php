<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class TaskLocalVariable extends BaseClient
{
    /**
     * Get Local Task Variables
     *
     * Retrieves all variables of a given task by id.
     *
     * @param string $id
     * @param GetTaskLocalVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getTaskLocalVariables(string $id, GetTaskLocalVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/task/$id/localVariables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update/Delete Local Task Variables
     *
     * Updates or deletes the variables in the context of a task. Updates precede deletions. So, if a variable is
     * updated AND deleted, the deletion overrides the update.
     *
     * @param string $id
     * @param PatchVariablesDto $bodyDto
     * @throws GuzzleException
     */
    public function modifyTaskLocalVariables(string $id, PatchVariablesDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/localVariables", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Local Task Variable
     *
     * Removes a local variable from a task by id.
     *
     * @param string $id
     * @param string $varName
     * @throws GuzzleException
     */
    public function deleteTaskLocalVariable(string $id, string $varName): void
    {
        $this->client->delete("/engine-rest/task/$id/localVariables/$varName", [
        ]);
    }

    /**
     * Get Local Task Variable
     *
     * Retrieves a variable from the context of a given task by id.
     *
     * @param string $id
     * @param string $varName
     * @param GetTaskLocalVariableDto|null $queryDto
     * @return VariableValueDto
     * @throws GuzzleException
     */
    public function getTaskLocalVariable(string $id, string $varName, GetTaskLocalVariableDto $queryDto = null): VariableValueDto
    {
        $response = $this->client->get("/engine-rest/task/$id/localVariables/$varName", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class);
    }

    /**
     * Update Local Task Variable
     *
     * Sets a variable in the context of a given task.
     *
     * @param string $id
     * @param string $varName
     * @param VariableValueDto $bodyDto
     * @throws GuzzleException
     */
    public function putTaskLocalVariable(string $id, string $varName, VariableValueDto $bodyDto): void
    {
        $this->client->put("/engine-rest/task/$id/localVariables/$varName", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Local Task Variable (Binary)
     *
     * Retrieves a binary variable from the context of a given task by id. Applicable for byte array and file
     * variables.
     *
     * @param string $id
     * @param string $varName
     * @return string
     * @throws GuzzleException
     */
    public function getTaskLocalVariableBinary(string $id, string $varName): string
    {
        $response = $this->client->get("/engine-rest/task/$id/localVariables/$varName/data", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Update Local Task Variable (Binary)
     *
     * Sets the serialized value for a binary variable or the binary value for a file variable.
     *
     * @param string $id
     * @param string $varName
     * @param MultiFormVariableBinaryDto $bodyDto
     * @throws GuzzleException
     */
    public function setBinaryTaskLocalVariable(string $id, string $varName, MultiFormVariableBinaryDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/localVariables/$varName/data", [
            'multipart' => $bodyDto->properties(),
        ]);
    }
}