<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class ProcessDefinition extends BaseClient
{
    /**
     * Get List
     *
     * Queries for process definitions that fulfill given parameters. Parameters may be the properties of
     * process definitions, such as the name, key or version. The size of the result set can be retrieved
     * by using the [Get Definition Count](https://docs.camunda.org/manual/develop/reference/rest/process-definition/get-query-count/) method.
     *
     * @param GetProcessDefinitionsDto|null $queryDto
     * @return array<ProcessDefinitionDto>
     * @throws GuzzleException
     */
    public function getProcessDefinitions(GetProcessDefinitionsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-definition", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDto::class . '[]');
    }

    /**
     * Get List Count
     *
     * Requests the number of process definitions that fulfill the query criteria.
     * Takes the same filtering parameters as the [Get Definitions](https://docs.camunda.org/manual/develop/reference/rest/process-definition/get-query/) method.
     *
     * @param GetProcessDefinitionsCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getProcessDefinitionsCount(GetProcessDefinitionsCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/process-definition/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Delete By Key
     *
     * Deletes process definitions by a given key which belong to no tenant id.
     *
     * @param string $key
     * @param DeleteProcessDefinitionsByKeyDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteProcessDefinitionsByKey(string $key, DeleteProcessDefinitionsByKeyDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/process-definition/key/$key", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves the latest version of the process definition which belongs to no tenant according to the `ProcessDefinition` interface in the engine.
     *
     * @param string $key
     * @return ProcessDefinitionDto
     * @throws GuzzleException
     */
    public function getProcessDefinitionByKey(string $key): ProcessDefinitionDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDto::class);
    }

    /**
     * Get Deployed Start Form
     *
     * Retrieves the deployed form that can be referenced from a start event.
     * For further information please refer to [User Guide](https://docs.camunda.org/manual/develop/user-guide/task-forms/#embedded-task-forms).
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    public function getDeployedStartFormByKey(string $key): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/deployed-start-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Diagram
     *
     * Retrieves the diagram for the latest version of the process definition which belongs to no tenant.
     *
     * If the process definition&#039;s deployment contains an image resource with the same file name
     * as the process definition, the deployed image will be returned by the Get Diagram endpoint.
     * Example: `someProcess.bpmn` and `someProcess.png`.
     * Supported file extentions for the image are: `svg`, `png`, `jpg`, and `gif`.
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    public function getProcessDefinitionDiagramByKey(string $key): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Start Form Variables
     *
     * Retrieves the start form variables for the latest process definition which belongs to no tenant
     * (only if they are defined via the
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms) approach).
     * The start form variables take form data specified on the start event into account.
     * If form fields are defined, the variable types and default values
     * of the form fields are taken into account.
     *
     * @param string $key
     * @param GetStartFormVariablesByKeyDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getStartFormVariablesByKey(string $key, GetStartFormVariablesByKeyDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/form-variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update History Time to Live
     *
     * Updates history time to live for the latest version of the process definition which belongs to no tenant.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $key
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByProcessDefinitionKey(string $key, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/key/$key/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Rendered Start Form
     *
     * Retrieves  the rendered form for the latest version of the process definition which belongs to no tenant.
     * This method can be used to get the HTML rendering of a
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    public function getRenderedStartFormByKey(string $key): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/rendered-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Start Instance
     *
     * Instantiates a given process definition, starts the latest version of the process definition
     * which belongs to no tenant.
     * Process variables and business key may be supplied in the request body.
     *
     * @param string $key
     * @param StartProcessInstanceDto $bodyDto
     * @return ProcessInstanceWithVariablesDto
     * @throws GuzzleException
     */
    public function startProcessInstanceByKey(string $key, StartProcessInstanceDto $bodyDto): ProcessInstanceWithVariablesDto
    {
        $response = $this->client->post("/engine-rest/process-definition/key/$key/start", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceWithVariablesDto::class);
    }

    /**
     * Get Start Form Key
     *
     * Retrieves the key of the start form for the latest version of the process definition
     * which belongs to no tenant.
     * The form key corresponds to the `FormData#formKey` property in the engine.
     *
     * @param string $key
     * @return FormDto
     * @throws GuzzleException
     */
    public function getStartFormByKey(string $key): FormDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/startForm", [
        ]);
        return $this->deserializeResponse($response, FormDto::class);
    }

    /**
     * Get Activity Instance Statistics
     *
     * Retrieves runtime statistics of the latest version of the given process definition
     * which belongs to no tenant, grouped by activities.
     * These statistics include the number of running activity instances, optionally the number of failed jobs
     * and also optionally the number of incidents either grouped by incident types or
     * for a specific incident type.
     **Note**: This does not include historic data.
     *
     * @param string $key
     * @param GetActivityStatisticsByProcessDefinitionKeyDto|null $queryDto
     * @return array<ActivityStatisticsResultDto>
     * @throws GuzzleException
     */
    public function getActivityStatisticsByProcessDefinitionKey(string $key, GetActivityStatisticsByProcessDefinitionKeyDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ActivityStatisticsResultDto::class . '[]');
    }

    /**
     * Submit Start Form
     *
     * Starts the latest version of the process definition which belongs to no tenant
     * using a set of process variables and the business key.
     * If the start event has Form Field Metadata defined, the process engine will perform backend validation
     * for any form fields which have validators defined.
     * See [Documentation on Generated Task Forms](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $key
     * @param StartProcessInstanceFormDto $bodyDto
     * @return ProcessInstanceDto
     * @throws GuzzleException
     */
    public function submitFormByKey(string $key, StartProcessInstanceFormDto $bodyDto): ProcessInstanceDto
    {
        $response = $this->client->post("/engine-rest/process-definition/key/$key/submit-form", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class);
    }

    /**
     * Activate/Suspend by Id
     *
     * Activates or suspends a given process definition by latest version of process definition key
     * which belongs to no tenant.
     *
     * @param string $key
     * @param ProcessDefinitionSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateProcessDefinitionSuspensionStateByKey(string $key, ProcessDefinitionSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/key/$key/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete By Key
     *
     * Deletes process definitions by a given key and which belong to a tenant id.
     *
     * @param string $key
     * @param string $tenantId
     * @param DeleteProcessDefinitionsByKeyAndTenantIdDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteProcessDefinitionsByKeyAndTenantId(string $key, string $tenantId, DeleteProcessDefinitionsByKeyAndTenantIdDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/process-definition/key/$key/tenant-id/$tenantId", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves the latest version of the process definition for tenant according to
     * the `ProcessDefinition` interface in the engine.
     *
     * @param string $key
     * @param string $tenantId
     * @return ProcessDefinitionDto
     * @throws GuzzleException
     */
    public function getLatestProcessDefinitionByTenantId(string $key, string $tenantId): ProcessDefinitionDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDto::class);
    }

    /**
     * Get Deployed Start Form
     *
     * Retrieves the deployed form that can be referenced from a start event.
     * For further information please refer to [User Guide](https://docs.camunda.org/manual/develop/user-guide/task-forms/#embedded-task-forms).
     *
     * @param string $key
     * @param string $tenantId
     * @return string
     * @throws GuzzleException
     */
    public function getDeployedStartFormByKeyAndTenantId(string $key, string $tenantId): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/deployed-start-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Diagram
     *
     * Retrieves the diagram for the latest version of the process definition for tenant.
     *
     * If the process definition&#039;s deployment contains an image resource with the same file name
     * as the process definition, the deployed image will be returned by the Get Diagram endpoint.
     * Example: `someProcess.bpmn` and `someProcess.png`.
     * Supported file extentions for the image are: `svg`, `png`, `jpg`, and `gif`.
     *
     * @param string $key
     * @param string $tenantId
     * @return string
     * @throws GuzzleException
     */
    public function getProcessDefinitionDiagramByKeyAndTenantId(string $key, string $tenantId): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Start Form Variables
     *
     * Retrieves the start form variables for the latest process definition for a tenant
     * (only if they are defined via the
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms) approach).
     * The start form variables take form data specified on the start event into account.
     * If form fields are defined, the variable types and default values
     * of the form fields are taken into account.
     *
     * @param string $key
     * @param string $tenantId
     * @param GetStartFormVariablesByKeyAndTenantIdDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getStartFormVariablesByKeyAndTenantId(string $key, string $tenantId, GetStartFormVariablesByKeyAndTenantIdDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/form-variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update History Time to Live
     *
     * Updates history time to live for the latest version of the process definition for a tenant.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $key
     * @param string $tenantId
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByProcessDefinitionKeyAndTenantId(string $key, string $tenantId, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Rendered Start Form
     *
     * Retrieves  the rendered form for the latest version of the process definition for a tenant.
     * This method can be used to get the HTML rendering of a
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $key
     * @param string $tenantId
     * @return string
     * @throws GuzzleException
     */
    public function getRenderedStartFormByKeyAndTenantId(string $key, string $tenantId): string
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/rendered-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Start Instance
     *
     * Instantiates a given process definition, starts the latest version of the process definition for tenant.
     * Process variables and business key may be supplied in the request body.
     *
     * @param string $key
     * @param string $tenantId
     * @param StartProcessInstanceDto $bodyDto
     * @return ProcessInstanceWithVariablesDto
     * @throws GuzzleException
     */
    public function startProcessInstanceByKeyAndTenantId(string $key, string $tenantId, StartProcessInstanceDto $bodyDto): ProcessInstanceWithVariablesDto
    {
        $response = $this->client->post("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/start", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceWithVariablesDto::class);
    }

    /**
     * Get Start Form Key
     *
     * Retrieves the key of the start form for the latest version of the process definition for a tenant.
     * The form key corresponds to the `FormData#formKey` property in the engine.
     *
     * @param string $key
     * @param string $tenantId
     * @return FormDto
     * @throws GuzzleException
     */
    public function getStartFormByKeyAndTenantId(string $key, string $tenantId): FormDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/startForm", [
        ]);
        return $this->deserializeResponse($response, FormDto::class);
    }

    /**
     * Get Activity Instance Statistics
     *
     * Retrieves runtime statistics of the latest version of the given process definition for a tenant,
     * grouped by activities.
     * These statistics include the number of running activity instances, optionally the number of failed jobs
     * and also optionally the number of incidents either grouped by incident types or
     * for a specific incident type.
     **Note**: This does not include historic data.
     *
     * @param string $key
     * @param string $tenantId
     * @param GetActivityStatisticsByProcessDefinitionKeyAndTenantIdDto|null $queryDto
     * @return array<ActivityStatisticsResultDto>
     * @throws GuzzleException
     */
    public function getActivityStatisticsByProcessDefinitionKeyAndTenantId(string $key, string $tenantId, GetActivityStatisticsByProcessDefinitionKeyAndTenantIdDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ActivityStatisticsResultDto::class . '[]');
    }

    /**
     * Submit Start Form
     *
     * Starts the latest version of the process definition for a tenant
     * using a set of process variables and the business key.
     * If the start event has Form Field Metadata defined, the process engine will perform backend validation
     * for any form fields which have validators defined.
     * See [Documentation on Generated Task Forms](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $key
     * @param string $tenantId
     * @param StartProcessInstanceFormDto $bodyDto
     * @return ProcessInstanceDto
     * @throws GuzzleException
     */
    public function submitFormByKeyAndTenantId(string $key, string $tenantId, StartProcessInstanceFormDto $bodyDto): ProcessInstanceDto
    {
        $response = $this->client->post("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/submit-form", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class);
    }

    /**
     * Activate/Suspend by Id
     *
     * Activates or suspends a given process definition by the latest version of
     * the process definition for tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @param ProcessDefinitionSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateProcessDefinitionSuspensionStateByKeyAndTenantId(string $key, string $tenantId, ProcessDefinitionSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get XML
     *
     * Retrieves latest version the BPMN 2.0 XML of a process definition.
     * Returns the XML for the latest version of the process definition for tenant.
     *
     * @param string $key
     * @param string $tenantId
     * @return ProcessDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getProcessDefinitionBpmn20XmlByKeyAndTenantId(string $key, string $tenantId): ProcessDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/tenant-id/$tenantId/xml", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDiagramDto::class);
    }

    /**
     * Get XML
     *
     * Retrieves latest version the BPMN 2.0 XML of a process definition.
     *
     * @param string $key
     * @return ProcessDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getProcessDefinitionBpmn20XmlByKey(string $key): ProcessDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/process-definition/key/$key/xml", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDiagramDto::class);
    }

    /**
     * Get Process Instance Statistics
     *
     * Retrieves runtime statistics of the process engine, grouped by process definitions.
     * These statistics include the number of running process instances, optionally the number of failed jobs
     * and also optionally the number of incidents either grouped by incident types or
     * for a specific incident type.
     **Note**: This does not include historic data.
     *
     * @param GetProcessDefinitionStatisticsDto|null $queryDto
     * @return array<ProcessDefinitionStatisticsResultDto>
     * @throws GuzzleException
     */
    public function getProcessDefinitionStatistics(GetProcessDefinitionStatisticsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-definition/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionStatisticsResultDto::class . '[]');
    }

    /**
     * Activate/Suspend By Key
     *
     * Activates or suspends process definitions with the given process definition key.
     *
     * @param ProcessDefinitionSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateProcessDefinitionSuspensionState(ProcessDefinitionSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Delete
     *
     * Deletes a running process instance by id.
     *
     * @param string $id
     * @param DeleteProcessDefinitionDto|null $queryDto
     * @throws GuzzleException
     */
    public function deleteProcessDefinition(string $id, DeleteProcessDefinitionDto $queryDto = null): void
    {
        $this->client->delete("/engine-rest/process-definition/$id", [
            'query' => $queryDto?->properties(),
        ]);
    }

    /**
     * Get
     *
     * Retrieves a process definition according to the `ProcessDefinition` interface in the engine.
     *
     * @param string $id
     * @return ProcessDefinitionDto
     * @throws GuzzleException
     */
    public function getProcessDefinition(string $id): ProcessDefinitionDto
    {
        $response = $this->client->get("/engine-rest/process-definition/$id", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDto::class);
    }

    /**
     * Get Deployed Start Form
     *
     * Retrieves the deployed form that can be referenced from a start event.
     * For further information please refer to [User Guide](https://docs.camunda.org/manual/develop/user-guide/task-forms/#embedded-task-forms).
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getDeployedStartForm(string $id): string
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/deployed-start-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Diagram
     *
     * Retrieves the diagram of a process definition.
     *
     * If the process definition&#039;s deployment contains an image resource with the same file name
     * as the process definition, the deployed image will be returned by the Get Diagram endpoint.
     * Example: `someProcess.bpmn` and `someProcess.png`.
     * Supported file extentions for the image are: `svg`, `png`, `jpg`, and `gif`.
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getProcessDefinitionDiagram(string $id): string
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/diagram", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Get Start Form Variables
     *
     * Retrieves the start form variables for a process definition
     * (only if they are defined via the
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms) approach).
     * The start form variables take form data specified on the start event into account.
     * If form fields are defined, the variable types and default values
     * of the form fields are taken into account.
     *
     * @param string $id
     * @param GetStartFormVariablesDto|null $queryDto
     * @return object
     * @throws GuzzleException
     */
    public function getStartFormVariables(string $id, GetStartFormVariablesDto $queryDto = null): object
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/form-variables", [
            'query' => $queryDto?->properties(),
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Update History Time to Live
     *
     * Updates history time to live for process definition.
     * The field is used within [History cleanup](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#history-cleanup).
     *
     * @param string $id
     * @param HistoryTimeToLiveDto $bodyDto
     * @throws GuzzleException
     */
    public function updateHistoryTimeToLiveByProcessDefinitionId(string $id, HistoryTimeToLiveDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/$id/history-time-to-live", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get Rendered Start Form
     *
     * Retrieves the rendered form for a process definition.
     * This method can be used to get the HTML rendering of a
     * [Generated Task Form](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $id
     * @return string
     * @throws GuzzleException
     */
    public function getRenderedStartForm(string $id): string
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/rendered-form", [
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * Restart Process Instance
     *
     * Restarts process instances that were canceled or terminated synchronously.
     * Can also restart completed process instances.
     * It will create a new instance using the original instance information.
     * To execute the restart asynchronously, use the
     * [Restart Process Instance Async](https://docs.camunda.org/manual/develop/reference/rest/process-definition/post-restart-process-instance-async/) method.
     *
     * For more information about the difference between synchronous and asynchronous execution,
     * please refer to the related section of the
     * [User Guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-restart/#execution).
     *
     * @param string $id
     * @param RestartProcessInstanceDto $bodyDto
     * @throws GuzzleException
     */
    public function restartProcessInstance(string $id, RestartProcessInstanceDto $bodyDto): void
    {
        $this->client->post("/engine-rest/process-definition/$id/restart", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Restart Process Instance Async
     *
     * Restarts process instances that were canceled or terminated asynchronously.
     * Can also restart completed process instances.
     * It will create a new instance using the original instance information.
     * To execute the restart asynchronously, use the
     * [Restart Process Instance](https://docs.camunda.org/manual/develop/reference/rest/process-definition/post-restart-process-instance-sync/) method.
     *
     * For more information about the difference between synchronous and asynchronous execution,
     * please refer to the related section of the
     * [User Guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-restart/#execution).
     *
     * @param string $id
     * @param RestartProcessInstanceDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function restartProcessInstanceAsyncOperation(string $id, RestartProcessInstanceDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/process-definition/$id/restart-async", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Start Instance
     *
     * Instantiates a given process definition.
     * Process variables and business key may be supplied in the request body.
     *
     * @param string $id
     * @param StartProcessInstanceDto $bodyDto
     * @return ProcessInstanceWithVariablesDto
     * @throws GuzzleException
     */
    public function startProcessInstance(string $id, StartProcessInstanceDto $bodyDto): ProcessInstanceWithVariablesDto
    {
        $response = $this->client->post("/engine-rest/process-definition/$id/start", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceWithVariablesDto::class);
    }

    /**
     * Get Start Form Key
     *
     * Retrieves the key of the start form for a process definition.
     * The form key corresponds to the `FormData#formKey` property in the engine.
     *
     * @param string $id
     * @return FormDto
     * @throws GuzzleException
     */
    public function getStartForm(string $id): FormDto
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/startForm", [
        ]);
        return $this->deserializeResponse($response, FormDto::class);
    }

    /**
     * Get Static Called Process Definitions
     *
     * For the given process, returns a list of called process definitions corresponding
     * to
     * the `CalledProcessDefinition` interface in the engine. The list
     * contains all process definitions
     * that are referenced statically by call activities in the given
     * process. This endpoint does not
     * resolve process definitions that are referenced with expressions. Each
     * called process definition
     * contains a list of call activity ids, which specifies the call
     * activities that are calling that
     * process. This endpoint does not resolve references to case
     * definitions.
     *
     * @param string $id
     * @return array<CalledProcessDefinitionDto>
     * @throws GuzzleException
     */
    public function getStaticCalledProcessDefinitions(string $id): array
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/static-called-process-definitions", [
        ]);
        return $this->deserializeResponse($response, CalledProcessDefinitionDto::class . '[]');
    }

    /**
     * Get Activity Instance Statistics
     *
     * Retrieves runtime statistics of a given process definition, grouped by activities.
     * These statistics include the number of running activity instances, optionally the number of failed jobs
     * and also optionally the number of incidents either grouped by incident types or for a specific incident type.
     **Note**: This does not include historic data.
     *
     * @param string $id
     * @param GetActivityStatisticsDto|null $queryDto
     * @return array<ActivityStatisticsResultDto>
     * @throws GuzzleException
     */
    public function getActivityStatistics(string $id, GetActivityStatisticsDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/statistics", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, ActivityStatisticsResultDto::class . '[]');
    }

    /**
     * Submit Start Form
     *
     * Starts a process instance using a set of process variables and the business key.
     * If the start event has Form Field Metadata defined, the process engine will perform backend validation
     * for any form fields which have validators defined.
     * See [Documentation on Generated Task Forms](https://docs.camunda.org/manual/develop/user-guide/task-forms/#generated-task-forms).
     *
     * @param string $id
     * @param StartProcessInstanceFormDto $bodyDto
     * @return ProcessInstanceDto
     * @throws GuzzleException
     */
    public function submitForm(string $id, StartProcessInstanceFormDto $bodyDto): ProcessInstanceDto
    {
        $response = $this->client->post("/engine-rest/process-definition/$id/submit-form", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, ProcessInstanceDto::class);
    }

    /**
     * Activate/Suspend By Id
     *
     * Activates or suspends a given process definition by id.
     *
     * @param string $id
     * @param ProcessDefinitionSuspensionStateDto $bodyDto
     * @throws GuzzleException
     */
    public function updateProcessDefinitionSuspensionStateById(string $id, ProcessDefinitionSuspensionStateDto $bodyDto): void
    {
        $this->client->put("/engine-rest/process-definition/$id/suspended", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Get XML
     *
     * Retrieves the BPMN 2.0 XML of a process definition.
     *
     * @param string $id
     * @return ProcessDefinitionDiagramDto
     * @throws GuzzleException
     */
    public function getProcessDefinitionBpmn20Xml(string $id): ProcessDefinitionDiagramDto
    {
        $response = $this->client->get("/engine-rest/process-definition/$id/xml", [
        ]);
        return $this->deserializeResponse($response, ProcessDefinitionDiagramDto::class);
    }
}