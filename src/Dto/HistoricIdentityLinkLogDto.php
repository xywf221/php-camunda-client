<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricIdentityLinkLogDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Id of the Historic identity link entry.
     */
    public ?string $id;

    /**
     * @var string|null The time when the identity link is logged.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $time;

    /**
     * @var string|null The type of identity link (candidate/assignee/owner).
     */
    public ?string $type;

    /**
     * @var string|null The id of the user/assignee.
     */
    public ?string $userId;

    /**
     * @var string|null The id of the group.
     */
    public ?string $groupId;

    /**
     * @var string|null The id of the task.
     */
    public ?string $taskId;

    /**
     * @var string|null The id of the process definition.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Type of operation (add/delete).
     */
    public ?string $operationType;

    /**
     * @var string|null The id of the assigner.
     */
    public ?string $assignerId;

    /**
     * @var string|null The id of the tenant.
     */
    public ?string $tenantId;

    /**
     * @var string|null The time after which the identity link should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this identity link.
     */
    public ?string $rootProcessInstanceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'time' => $this->time ?? null,
            'type' => $this->type ?? null,
            'userId' => $this->userId ?? null,
            'groupId' => $this->groupId ?? null,
            'taskId' => $this->taskId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'operationType' => $this->operationType ?? null,
            'assignerId' => $this->assignerId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
