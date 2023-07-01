<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricIncidentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the incident.
     */
    public ?string $id;

    /**
     * @var string|null The key of the process definition this incident is associated with.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process definition this incident is associated with.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition this incident is associated with.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the execution this incident is associated with.
     */
    public ?string $executionId;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this incident.
     */
    public ?string $rootProcessInstanceId;

    /**
     * @var string|null The time this incident happened.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $createTime;

    /**
     * @var string|null The time this incident has been deleted or resolved.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $endTime;

    /**
     * @var string|null The time after which the incident should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The type of incident, for example: `failedJobs` will be returned in case of an
     * incident which identified a failed job during the execution of a
     * process instance. See the [User Guide](/manual/develop/user-
     * guide/process-engine/incidents/#incident-types) for a list of
     * incident types.
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
     * @var string|null The payload of this incident at the time when it occurred.
     */
    public ?string $historyConfiguration;

    /**
     * @var string|null The message of this incident.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null The id of the tenant this incident is associated with.
     */
    public ?string $tenantId;

    /**
     * @var string|null The job definition id the incident is associated with.
     */
    public ?string $jobDefinitionId;

    /**
     * @var bool|null If true, this incident is open.
     */
    public ?bool $open;

    /**
     * @var bool|null If true, this incident has been deleted.
     */
    public ?bool $deleted;

    /**
     * @var bool|null If true, this incident has been resolved.
     */
    public ?bool $resolved;

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
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
            'createTime' => $this->createTime ?? null,
            'endTime' => $this->endTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'incidentType' => $this->incidentType ?? null,
            'activityId' => $this->activityId ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'causeIncidentId' => $this->causeIncidentId ?? null,
            'rootCauseIncidentId' => $this->rootCauseIncidentId ?? null,
            'configuration' => $this->configuration ?? null,
            'historyConfiguration' => $this->historyConfiguration ?? null,
            'incidentMessage' => $this->incidentMessage ?? null,
            'tenantId' => $this->tenantId ?? null,
            'jobDefinitionId' => $this->jobDefinitionId ?? null,
            'open' => $this->open ?? null,
            'deleted' => $this->deleted ?? null,
            'resolved' => $this->resolved ?? null,
            'annotation' => $this->annotation ?? null,
        ];
    }

}
