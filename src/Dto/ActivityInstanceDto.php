<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ActivityInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the activity instance.
     */
    public ?string $id;

    /**
     * @var string|null The id of the parent activity instance, for example a sub process instance.
     */
    public ?string $parentActivityInstanceId;

    /**
     * @var string|null The id of the activity.
     */
    public ?string $activityId;

    /**
     * @var string|null The name of the activity
     */
    public ?string $activityName;

    /**
     * @var string|null The type of activity (corresponds to the XML element name in the BPMN 2.0, e.g., 'userTask')
     */
    public ?string $activityType;

    /**
     * @var string|null The id of the process instance this activity instance is part of.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the process definition.
     */
    public ?string $processDefinitionId;

    /**
     * @var array<ActivityInstanceDto>|null A list of child activity instances.
     */
    public ?array $childActivityInstances;

    /**
     * @var array<TransitionInstanceDto>|null A list of child transition instances.
     * A transition instance represents an execution waiting in an asynchronous continuation.
     */
    public ?array $childTransitionInstances;

    /**
     * @var array<string>|null A list of execution ids.
     */
    public ?array $executionIds;

    /**
     * @var array<string>|null A list of incident ids.
     */
    public ?array $incidentIds;

    /**
     * @var array<ActivityInstanceIncidentDto>|null A list of JSON objects containing incident specific properties:
     * `id`: the id of the incident
     * `activityId`: the activity id in which the incident occurred
     */
    public ?array $incidents;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'parentActivityInstanceId' => $this->parentActivityInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'activityName' => $this->activityName ?? null,
            'activityType' => $this->activityType ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'childActivityInstances' => $this->childActivityInstances ?? null,
            'childTransitionInstances' => $this->childTransitionInstances ?? null,
            'executionIds' => $this->executionIds ?? null,
            'incidentIds' => $this->incidentIds ?? null,
            'incidents' => $this->incidents ?? null,
        ];
    }

}
