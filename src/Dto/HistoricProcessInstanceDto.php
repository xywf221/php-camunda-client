<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the process instance.
     */
    public ?string $id;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process.
     */
    public ?string $rootProcessInstanceId;

    /**
     * @var string|null The id of the parent process instance, if it exists.
     */
    public ?string $superProcessInstanceId;

    /**
     * @var string|null The id of the parent case instance, if it exists.
     */
    public ?string $superCaseInstanceId;

    /**
     * @var string|null The id of the parent case instance, if it exists.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The name of the process definition that this process instance belongs to.
     */
    public ?string $processDefinitionName;

    /**
     * @var string|null The key of the process definition that this process instance belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var int|null The version of the process definition that this process instance belongs to.
     */
    public ?int $processDefinitionVersion;

    /**
     * @var string|null The id of the process definition that this process instance belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The business key of the process instance.
     */
    public ?string $businessKey;

    /**
     * @var string|null The time the instance was started. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $startTime;

    /**
     * @var string|null The time the instance ended. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $endTime;

    /**
     * @var string|null The time after which the instance should be removed by the History Cleanup job. Default [format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var int|null The time the instance took to finish (in milliseconds).
     */
    public ?int $durationInMillis;

    /**
     * @var string|null The id of the user who started the process instance.
     */
    public ?string $startUserId;

    /**
     * @var string|null The id of the initial activity that was executed (e.g., a start event).
     */
    public ?string $startActivityId;

    /**
     * @var string|null The provided delete reason in case the process instance was canceled during execution.
     */
    public ?string $deleteReason;

    /**
     * @var string|null The tenant id of the process instance.
     */
    public ?string $tenantId;

    /**
     * @var string|null Last state of the process instance, possible values are:
     *
     * `ACTIVE` - running process instance
     *
     * `SUSPENDED` - suspended process instances
     *
     * `COMPLETED` - completed through normal end event
     *
     * `EXTERNALLY_TERMINATED` - terminated externally, for instance through REST API
     *
     * `INTERNALLY_TERMINATED` - terminated internally, for instance by terminating boundary event
     */
    public ?string $state;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
            'superProcessInstanceId' => $this->superProcessInstanceId ?? null,
            'superCaseInstanceId' => $this->superCaseInstanceId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionVersion' => $this->processDefinitionVersion ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'businessKey' => $this->businessKey ?? null,
            'startTime' => $this->startTime ?? null,
            'endTime' => $this->endTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'durationInMillis' => $this->durationInMillis ?? null,
            'startUserId' => $this->startUserId ?? null,
            'startActivityId' => $this->startActivityId ?? null,
            'deleteReason' => $this->deleteReason ?? null,
            'tenantId' => $this->tenantId ?? null,
            'state' => $this->state ?? null,
        ];
    }

}
