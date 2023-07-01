<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Task extends BaseClient
{
    /**
     * Get List
     *
     * Queries for tasks that fulfill a given filter. The size of the result set can be
     * retrieved by using the Get Task Count method.
     **Security Consideration:** There are several query parameters (such as
     * assigneeExpression) for specifying an EL expression. These are disabled by default to
     * prevent remote code execution. See the section on
     * [security considerations](https://docs.camunda.org/manual/develop/user-guide/process-engine/securing-custom-code/)
     * for custom code in the user guide for details.
     *
     * @param GetTasksDto|null $queryDto
     * @return array<TaskDto>
     * @throws GuzzleException
     */
    public function getTasks(GetTasksDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/task", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, TaskDto::class . '[]');
    }

    /**
     * Get List (POST)
     *
     * Queries for tasks that fulfill a given filter. This method is slightly more powerful
     * than the [Get Tasks](https://docs.camunda.org/manual/develop/reference/rest/task/get-query/) method because it
     * allows filtering by multiple process or task variables of types `String`, `Number`
     * or `Boolean`. The size of the result set can be retrieved by using the
     * [Get Task Count (POST)](https://docs.camunda.org/manual/develop/reference/rest/task/post-query-count/) method.
     **Security Consideration**:
     * There are several parameters (such as `assigneeExpression`) for specifying an EL
     * expression. These are disabled by default to prevent remote code execution. See the
     * section on
     * [security considerations for custom code](https://docs.camunda.org/manual/develop/user-guide/process-engine/securing-custom-code/)
     * in the user guide for details.
     *
     * @param QueryTasksDto|null $queryDto
     * @param TaskQueryDto $bodyDto
     * @return array<TaskDto>
     * @throws GuzzleException
     */
    public function queryTasks(QueryTasksDto $queryDto = null, TaskQueryDto $bodyDto): array
    {
        $response = $this->client->post("/engine-rest/task", [
            'query' => $queryDto?->properties(),
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, TaskDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Retrieves the number of tasks that fulfill a provided filter. Corresponds to the size
     * of the result set when using the [Get Tasks](https://docs.camunda.org/manual/develop/reference/rest/task/) method.
     **Security Consideration:** There are several query parameters (such as
     * assigneeExpression) for specifying an EL expression. These are disabled by default to
     * prevent remote code execution. See the section on
     * [security considerations](https://docs.camunda.org/manual/develop/user-guide/process-engine/securing-custom-code/)
     * for custom code in the user guide for details.
     *
     * @param GetTasksCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getTasksCount(GetTasksCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/task/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Get List Count (POST)
     *
     * Retrieves the number of tasks that fulfill the given filter. Corresponds to the size
     * of the result set of the [Get Tasks (POST)](https://docs.camunda.org/manual/develop/reference/rest/task/post-query/)
     * method and takes the same parameters.
     **Security Consideration**:
     * There are several parameters (such as `assigneeExpression`) for specifying an EL
     * expression. These are disabled by default to prevent remote code execution. See the
     * section on
     * [security considerations for custom code](https://docs.camunda.org/manual/develop/user-guide/process-engine/securing-custom-code/)
     * in the user guide for details.
     *
     * @param TaskQueryDto $bodyDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryTasksCount(TaskQueryDto $bodyDto): CountResultDto
    {
        $response = $this->client->post("/engine-rest/task/count", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create
     *
     * Creates a new task.
     *
     * @param TaskDto $bodyDto
     * @throws GuzzleException
     */
    public function createTask(TaskDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/create", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Task Count By Candidate Group
     *
     * Retrieves the number of tasks for each candidate group.
     *
     * @return array<TaskCountByCandidateGroupResultDto>
     * @throws GuzzleException
     */
    public function getTaskCountByCandidateGroup(): array
    {
        $response = $this->client->get("/engine-rest/task/report/candidate-group-count", [
        ]);
        return $this->deserializeResponse($response, TaskCountByCandidateGroupResultDto::class . '[]');
    }

    /**
     * Delete
     *
     * Removes a task by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteTask(string $id): void
    {
        $this->client->delete("/engine-rest/task/$id", [
        ]);
    }

    /**
     * Get
     *
     * Retrieves a task by id.
     *
     * @param string $id
     * @return TaskDto
     * @throws GuzzleException
     */
    public function getTask(string $id): TaskDto
    {
        $response = $this->client->get("/engine-rest/task/$id", [
        ]);
        return $this->deserializeResponse($response, TaskDto::class);
    }

    /**
     * Update
     *
     * Updates a task.
     *
     * @param string $id
     * @param TaskDto $bodyDto
     * @throws GuzzleException
     */
    public function updateTask(string $id, TaskDto $bodyDto): void
    {
        $this->client->put("/engine-rest/task/$id", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Set Assignee
     *
     * Changes the assignee of a task to a specific user.
     **Note:** The difference with the [Claim Task](https://docs.camunda.org/manual/develop/reference/rest/task/post-claim/)
     * method is that this method does not check if the task already has a user
     * assigned to it.
     *
     * @param string $id
     * @param UserIdDto $bodyDto
     * @throws GuzzleException
     */
    public function setAssignee(string $id, UserIdDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/assignee", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Handle BPMN Error
     *
     * Reports a business error in the context of a running task by id. The error code must
     * be specified to identify the BPMN error handler. See the documentation for
     * [Reporting Bpmn Error](https://docs.camunda.org/manual/develop/reference/bpmn20/tasks/user-task/#reporting-bpmn-error)
     * in User Tasks.
     *
     * @param string $id
     * @param TaskBpmnErrorDto $bodyDto
     * @throws GuzzleException
     */
    public function handleBpmnError(string $id, TaskBpmnErrorDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/bpmnError", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Handle BPMN Escalation
     *
     * Reports an escalation in the context of a running task by id. The escalation code must
     * be specified to identify the escalation handler. See the documentation for
     * [Reporting Bpmn Escalation](https://docs.camunda.org/manual/develop/reference/bpmn20/tasks/user-task/#reporting-bpmn-escalation)
     * in User Tasks.
     *
     * @param string $id
     * @param TaskEscalationDto $bodyDto
     * @throws GuzzleException
     */
    public function handleEscalation(string $id, TaskEscalationDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/bpmnEscalation", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Claim
     *
     * Claims a task for a specific user.
     **Note:** The difference with the
     * [Set Assignee](https://docs.camunda.org/manual/develop/reference/rest/task/post-assignee/)
     * method is that here a check is performed to see if the task already has a user
     * assigned to it.
     *
     * @param string $id
     * @param UserIdDto $bodyDto
     * @throws GuzzleException
     */
    public function claim(string $id, UserIdDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/claim", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Complete
     *
     * Completes a task and updates process variables.
     *
     * @param string $id
     * @param CompleteTaskDto $bodyDto
     * @return object
     * @throws GuzzleException
     */
    public function complete(string $id, CompleteTaskDto $bodyDto): object
    {
        $response = $this->client->post("/engine-rest/task/$id/complete", [
            'json' => $bodyDto->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Delegate
     *
     * Delegates a task to another user.
     *
     * @param string $id
     * @param UserIdDto $bodyDto
     * @throws GuzzleException
     */
    public function delegateTask(string $id, UserIdDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/delegate", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Deployed Form
     *
     * Retrieves the deployed form that is referenced from a given task. For further
     * information please refer to the
     * [User Guide](https://docs.camunda.org/manual/develop/user-guide/task-forms/#embedded-task-forms).
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getDeployedForm(string $id): string
    {
        $response = $this->client->get("/engine-rest/task/$id/deployed-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Form Key
     *
     * Retrieves the form key for a task. The form key corresponds to the `FormData#formKey`
     * property in the engine. This key can be used to do task-specific form rendering in
     * client applications. Additionally, the context path of the containing process
     * application is returned.
     *
     * @param string $id
     * @return FormDto
     * @throws GuzzleException
     */
    public function getForm(string $id): FormDto
    {
        $response = $this->client->get("/engine-rest/task/$id/form", [
        ]);
        return $this->deserializeResponse($response, FormDto::class);
    }

    /**
     * Get Task Form Variables
     *
     * Retrieves the form variables for a task. The form variables take form data specified
     * on the task into account. If form fields are defined, the variable types and default
     * values of the form fields are taken into account.
     *
     * @param string $id
     * @param GetFormVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getFormVariables(string $id, GetFormVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/task/$id/form-variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get Rendered Form
     *
     * Retrieves the rendered form for a task. This method can be used to get the HTML
     * rendering of a
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getRenderedForm(string $id): string
    {
        $response = $this->client->get("/engine-rest/task/$id/rendered-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Resolve
     *
     * Resolves a task and updates execution variables.
     *
     * Resolving a task marks that the assignee is done with the task delegated to them, and
     * that it can be sent back to the owner. Can only be executed when the task has been
     * delegated. The assignee will be set to the owner, who performed the delegation.
     *
     * @param string $id
     * @param CompleteTaskDto $bodyDto
     * @throws GuzzleException
     */
    public function resolve(string $id, CompleteTaskDto $bodyDto): void
    {
        $this->client->post("/engine-rest/task/$id/resolve", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Submit Form
     *
     * Completes a task and updates process variables using a form submit. There are two
     * difference between this method and the `complete` method:
     * If the task is in state `PENDING` - i.e., has been delegated before, it is not
     * completed but resolved. Otherwise it will be completed.
     * If the task has Form Field Metadata defined, the process engine will perform backend
     * validation for any form fields which have validators defined.
     * See the
     * [Generated Task Forms](https://docs.camunda.org/manual/develop/user-guide/task-forms/_index/#generated-task-forms)
     * section of the [User Guide](https://docs.camunda.org/manual/develop/user-guide/) for more information.
     *
     * @param string $id
     * @param CompleteTaskDto $bodyDto
     * @return object
     * @throws GuzzleException
     */
    public function submit(string $id, CompleteTaskDto $bodyDto): object
    {
        $response = $this->client->post("/engine-rest/task/$id/submit-form", [
            'json' => $bodyDto->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Unclaim
     *
     * Resets a task&#039;s assignee. If successful, the task is not assigned to a user.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function unclaim(string $id): void
    {
        $this->client->post("/engine-rest/task/$id/unclaim", [
        ]);
    }
}