<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class TaskVariable extends BaseClient
{
    /**
     * Get Task Variables
     *
     * Retrieves all variables visible from the task. A variable is visible from the task if it is a local task
     * variable or declared in a parent scope of the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param GetTaskVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getTaskVariables(string $id, GetTaskVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/task/$id/variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update/Delete Task Variables
     *
     * Updates or deletes the variables visible from the task. Updates precede deletions. So, if a variable is
     * updated AND deleted, the deletion overrides the update. A variable is visible from the task if it is a
     * local task variable or declared in a parent scope of the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param PatchVariablesDto $bodyDto
     * @throws GuzzleException
     */
    public function modifyTaskVariables(string $id, PatchVariablesDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/variables", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete Task Variable
     *
     * Removes a variable that is visible to a task. A variable is visible to a task if it is a local task
     * variable or declared in a parent scope of the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param string $varName
     * @throws GuzzleException
     */
    public function deleteTaskVariable(string $id, string $varName): void
    {
        $this->client->delete("/engine-rest/task/$id/variables/$varName", [
        ]);
    }

    /**
     * Get Task Variable
     *
     * Retrieves a variable from the context of a given task.
     * The variable must be visible from the task. It is visible from the task if it is a local task variable or
     * declared in a parent scope of the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param string $varName
     * @param GetTaskVariableDto|null $queryDto
     * @return VariableValueDto
     * @throws GuzzleException
     */
    public function getTaskVariable(string $id, string $varName, GetTaskVariableDto $queryDto = null): VariableValueDto
    {
        $response = $this->client->get("/engine-rest/task/$id/variables/$varName", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, VariableValueDto::class);
    }

    /**
     * Update Task Variable
     *
     * Updates a process variable that is visible from the Task scope. A variable is visible from the task if it
     * is a local task variable, or declared in a parent scope of the task. See the documentation on
     * [variable scopes and visibility](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables#variable-scopes-and-variable-visibility).
     **Note**: If a variable doesn&#039;t exist, the variable is created in the top-most scope
     * visible from the task.
     *
     * @param string $id
     * @param string $varName
     * @param VariableValueDto $bodyDto
     * @throws GuzzleException
     */
    public function putTaskVariable(string $id, string $varName, VariableValueDto $bodyDto): void
    {
        $this->client->put("/engine-rest/task/$id/variables/$varName", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Task Variable (Binary)
     *
     * Retrieves a binary variable from the context of a given task. Applicable for byte array and file
     * variables. The variable must be visible from the task. It is visible from the task if it is a local task
     * variable or declared in a parent scope of the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param string $varName
     * @return string
     * @throws GuzzleException
     */
    public function getTaskVariableBinary(string $id, string $varName): string
    {
        $response = $this->client->get("/engine-rest/task/$id/variables/$varName/data", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Update Task Variable (Binary)
     *
     * Sets the serialized value for a binary variable or the binary value for a file variable visible from the
     * task. A variable is visible from the task if it is a local task variable or declared in a parent scope of
     * the task. See documentation on
     * [visiblity of variables](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/).
     *
     * @param string $id
     * @param string $varName
     * @param MultiFormVariableBinaryDto $bodyDto
     * @throws GuzzleException
     */
    public function setBinaryTaskVariable(string $id, string $varName, MultiFormVariableBinaryDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/variables/$varName/data", [
            'multipart' => $bodyDto->properties(),
        ]);
    }
}