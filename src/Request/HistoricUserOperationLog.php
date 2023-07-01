<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class HistoricUserOperationLog extends BaseClient
{
    /**
     * Get User Operation Log (Historic)
     *
     * Queries for user operation log entries that fulfill the given parameters.
     * The size of the result set can be retrieved by using the
     * [Get User Operation Log Count](https://docs.camunda.org/manual/develop/reference/rest/history/user-operation-log/get-user-operation-log-query-count/)
     * method.
     *
     * Note that the properties of operation log entries are interpreted as
     * restrictions on the entities they apply to. That means, if a single
     * process instance is updated, the field `processInstanceId` is
     * populated. If a single operation updates all process instances of the
     * same process definition, the field `processInstanceId` is `null` (a
     * `null` restriction is viewed as a wildcard, i.e., matches a process
     * instance with any id) and the field `processDefinitionId` is
     * populated. This way, which entities were changed by a user operation
     * can easily be reconstructed.
     *
     * @param QueryUserOperationEntriesDto|null $queryDto
     * @return array<UserOperationLogEntryDto>
     * @throws GuzzleException
     */
    public function queryUserOperationEntries(QueryUserOperationEntriesDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/history/user-operation", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, UserOperationLogEntryDto::class . '[]');
    }

    /**
     * Get User Operation Log Count
     *
     * Queries for the number of user operation log entries that fulfill the given parameters.
     * Takes the same parameters as the
     * [Get User Operation Log (Historic)](https://docs.camunda.org/manual/develop/reference/rest/history/user-operation-log/get-user-operation-log-query/)
     * method.
     *
     * @param QueryUserOperationCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function queryUserOperationCount(QueryUserOperationCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/history/user-operation/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Clear Annotation of an User Operation Log (Historic)
     *
     * Clear the annotation which was previously set for auditing reasons.
     *
     * @param string $operationId
     * @throws GuzzleException
     */
    public function clearAnnotationUserOperationLog(string $operationId): void
    {
        $this->client->put("/engine-rest/history/user-operation/$operationId/clear-annotation", [
        ]);
    }

    /**
     * Set Annotation to an User Operation Log (Historic)
     *
     * Set an annotation for auditing reasons.
     *
     * @param string $operationId
     * @param AnnotationDto $bodyDto
     * @throws GuzzleException
     */
    public function setAnnotationUserOperationLog(string $operationId, AnnotationDto $bodyDto): void
    {
        $this->client->put("/engine-rest/history/user-operation/$operationId/set-annotation", [
            'json' => $bodyDto->properties(),
        ]);
    }
}