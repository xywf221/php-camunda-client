<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricIncidentsCountDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Restricts to incidents that have the given id.
     */
    public ?string $incidentId;

    /**
     * @var string|null Restricts to incidents that belong to the given incident type. See the [User
     * Guide](/manual/develop/user-guide/process-engine/incidents/#incident-types)
     * for a list of incident types.
     */
    public ?string $incidentType;

    /**
     * @var string|null Restricts to incidents that have the given incident message.
     */
    public ?string $incidentMessage;

    /**
     * @var string|null Restricts to incidents that incidents message is a substring of the given value.
     * The string can include the wildcard character '%' to express
     * like-strategy: starts with (string%), ends with (%string) or contains
     * (%string%).
     */
    public ?string $incidentMessageLike;

    /**
     * @var string|null Restricts to incidents that belong to a process definition with the given id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Restricts to incidents that have the given processDefinitionKey.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Restricts to incidents that have one of the given process definition keys.
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
     * @var string|null Restricts to incidents that have a createTime date before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $createTimeBefore;

    /**
     * @var string|null Restricts to incidents that have a createTime date after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $createTimeAfter;

    /**
     * @var string|null Restricts to incidents that have an endTimeBefore date before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $endTimeBefore;

    /**
     * @var string|null Restricts to incidents that have an endTimeAfter date after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $endTimeAfter;

    /**
     * @var string|null Restricts to incidents that belong to an activity with the given id.
     */
    public ?string $activityId;

    /**
     * @var string|null Restricts to incidents that were created due to the failure of an activity with the given
     * id.
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
     * @var string|null Restricts to incidents that have the given parameter set as history configuration.
     */
    public ?string $historyConfiguration;

    /**
     * @var bool|null Restricts to incidents that are open.
     */
    public ?bool $open;

    /**
     * @var bool|null Restricts to incidents that are resolved.
     */
    public ?bool $resolved;

    /**
     * @var bool|null Restricts to incidents that are deleted.
     */
    public ?bool $deleted;

    /**
     * @var string|null Restricts to incidents that have one of the given comma-separated tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic incidents that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Restricts to incidents that have one of the given comma-separated job definition ids.
     */
    public ?string $jobDefinitionIdIn;

    /**
     * @var string|null Sort the results lexicographically by a given criterion.
     * Must be used in conjunction with the sortOrder parameter.
     */
    public ?string $sortBy;

    /**
     * @var string|null Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     */
    public ?string $sortOrder;


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
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'executionId' => $this->executionId ?? null,
            'createTimeBefore' => $this->createTimeBefore ?? null,
            'createTimeAfter' => $this->createTimeAfter ?? null,
            'endTimeBefore' => $this->endTimeBefore ?? null,
            'endTimeAfter' => $this->endTimeAfter ?? null,
            'activityId' => $this->activityId ?? null,
            'failedActivityId' => $this->failedActivityId ?? null,
            'causeIncidentId' => $this->causeIncidentId ?? null,
            'rootCauseIncidentId' => $this->rootCauseIncidentId ?? null,
            'configuration' => $this->configuration ?? null,
            'historyConfiguration' => $this->historyConfiguration ?? null,
            'open' => $this->open ?? null,
            'resolved' => $this->resolved ?? null,
            'deleted' => $this->deleted ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'jobDefinitionIdIn' => $this->jobDefinitionIdIn ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
        ];
    }

}
