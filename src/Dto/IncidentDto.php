<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class IncidentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the incident.
     */
    public ?string $id;

    /**
     * @var string|null The id of the process definition this incident is associated with.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The id of the process instance this incident is associated with.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the execution this incident is associated with.
     */
    public ?string $executionId;

    /**
     * @var string|null The time this incident happened. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $incidentTimestamp;

    /**
     * @var string|null The type of incident, for example: `failedJobs` will be returned in case of an incident which identified
     * a failed job during the execution of a process instance.
     * @link https://docs.camunda.org/manual/develop/user-guide/process-engine/incidents/#incident-types for a list of incident types
     */
    public ?string $incidentType;

    /**
     * @var string|null The id of the activity this incident is associated with.
     */
    public ?string $activityId;

    /**
     * @var string|null The id of the activity on which the last exception occurred.
     */
    public ?string $failedActivityId;

    /**
     * @var string|null The id of the associated cause incident which has been triggered.
     */
    public ?string $causeIncidentId;

    /**
     * @var string|null The id of the associated root cause incident which has been triggered.
     */
    public ?string $rootCauseIncidentId;

    /**
     * @var string|null The payload of this incident.
     */
    public ?string $configuration;

    /**
     * @var string|null The id of the tenant this incident is associated with.
     */
    public ?string $tenantId;

    /**
     * @var string|null The message of this incident.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null The job definition id the incident is associated with.
     */
    public ?string $jobDefinitionId;

    /**
     * @var string|null The annotation set to the incident.
     */
    public ?string $annotation;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'incidentTimestamp' => $this->incidentTimestamp ?? null,
            'incidentType' => $this->incidentType ?? null,
            'activityId' => $this->activityId ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'causeIncidentId' => $this->causeIncidentId ?? null,
            'rootCauseIncidentId' => $this->rootCauseIncidentId ?? null,
            'configuration' => $this->configuration ?? null,
            'tenantId' => $this->tenantId ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'annotation' => $this->annotation ?? null,
        ];
    }

}
