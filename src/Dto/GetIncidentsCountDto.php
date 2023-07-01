<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetIncidentsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Restricts to incidents that have the given id.
     */
    public ?string $incidentId;

    /**
     * @var string|null Restricts to incidents that belong to the given incident type.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident
     * types     */
    public ?string $incidentType;

    /**
     * @var string|null Restricts to incidents that have the given incident message.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null Restricts to incidents that incidents message is a substring of the given value. The string can include
     * the wildcard character '%' to express like-strategy: starts with (`string%`), ends with (`%string`) or
     * contains (`%string%`).
     */
    public ?string $incidentMessageLike;

    /**
     * @var string|null Restricts to incidents that belong to a process definition with the given id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Restricts to incidents that belong to a process definition with the given keys. Must be a
     * comma-separated list.
     */
    public ?string $processDefinitionKeyIn;

    /**
     * @var string|null Restricts to incidents that belong to a process instance with the given id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Restricts to incidents that belong to an execution with the given id.
     */
    public ?string $executionId;

    /**
     * @var string|null Restricts to incidents that have an incidentTimestamp date before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date
     * must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $incidentTimestampBefore;

    /**
     * @var string|null Restricts to incidents that have an incidentTimestamp date after the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date
     * must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $incidentTimestampAfter;

    /**
     * @var string|null Restricts to incidents that belong to an activity with the given id.
     */
    public ?string $activityId;

    /**
     * @var string|null Restricts to incidents that were created due to the failure of an activity with the given id.
     */
    public ?string $failedActivityId;

    /**
     * @var string|null Restricts to incidents that have the given incident id as cause incident.
     */
    public ?string $causeIncidentId;

    /**
     * @var string|null Restricts to incidents that have the given incident id as root cause incident.
     */
    public ?string $rootCauseIncidentId;

    /**
     * @var string|null Restricts to incidents that have the given parameter set as configuration.
     */
    public ?string $configuration;

    /**
     * @var string|null Restricts to incidents that have one of the given comma-separated tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var string|null Restricts to incidents that have one of the given comma-separated job definition ids.
     */
    public ?string $jobDefinitionIdIn;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'incidentId' => $this->incidentId ?? null,
            'incidentType' => $this->incidentType ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'incidentMessageLike' => $this->incidentMessageLike ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'incidentTimestampBefore' => $this->incidentTimestampBefore ?? null,
            'incidentTimestampAfter' => $this->incidentTimestampAfter ?? null,
            'activityId' => $this->activityId ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'causeIncidentId' => $this->causeIncidentId ?? null,
            'rootCauseIncidentId' => $this->rootCauseIncidentId ?? null,
            'configuration' => $this->configuration ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'jobDefinitionIdIn' => $this->jobDefinitionIdIn ?? null,
        ];
    }

}
