<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TransitionInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the transition instance.
     */
    public ?string $id;

    /**
     * @var string|null The id of the parent activity instance, for example a sub process instance.
     */
    public ?string $parentActivityInstanceId;

    /**
     * @var string|null The id of the activity that this instance enters (asyncBefore job) or leaves (asyncAfter job)
     */
    public ?string $activityId;

    /**
     * @var string|null The name of the activity that this instance enters (asyncBefore job) or leaves (asyncAfter job)
     */
    public ?string $activityName;

    /**
     * @var string|null The type of the activity that this instance enters (asyncBefore job) or leaves (asyncAfter job)
     */
    public ?string $activityType;

    /**
     * @var string|null The id of the process instance this instance is part of.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the process definition.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The execution id.
     */
    public ?string $executionId;

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
            'executionId' => $this->executionId ?? null,
            'incidentIds' => $this->incidentIds ?? null,
            'incidents' => $this->incidents ?? null,
        ];
    }

}
