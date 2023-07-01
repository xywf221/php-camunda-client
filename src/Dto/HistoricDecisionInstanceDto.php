<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricDecisionInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision instance.
     */
    public ?string $id;

    /**
     * @var string|null The id of the decision definition that this decision instance belongs to.
     */
    public ?string $decisionDefinitionId;

    /**
     * @var string|null The key of the decision definition that this decision instance belongs to.
     */
    public ?string $decisionDefinitionKey;

    /**
     * @var string|null The name of the decision definition that this decision instance belongs to.
     */
    public ?string $decisionDefinitionName;

    /**
     * @var string|null The time the instance was evaluated.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $evaluationTime;

    /**
     * @var string|null The time after which the instance should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The id of the process definition that this decision instance belongs to.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definition that this decision instance belongs to.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null The id of the process instance that this decision instance belongs to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The id of the case definition that this decision instance belongs to.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null The key of the case definition that this decision instance belongs to.
     */
    public ?string $caseDefinitionKey;

    /**
     * @var string|null The id of the case instance that this decision instance belongs to.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null The id of the activity that this decision instance belongs to.
     */
    public ?string $activityId;

    /**
     * @var string|null The id of the activity instance that this decision instance belongs to.
     */
    public ?string $activityInstanceId;

    /**
     * @var string|null The tenant id of the historic decision instance.
     */
    public ?string $tenantId;

    /**
     * @var string|null The id of the authenticated user that has evaluated this decision instance without
     * a process or case instance.
     */
    public ?string $userId;

    /**
     * @var array<HistoricDecisionInputInstanceDto>|null The list of decision input values. **Only exists** if `includeInputs`
     * was set to `true` in the query.
     */
    public ?array $inputs;

    /**
     * @var array<HistoricDecisionOutputInstanceDto>|null The list of decision output values. **Only exists** if `includeOutputs`
     * was set to `true` in the query.
     */
    public ?array $ouputs;

    /**
     * @var int|null The result of the collect aggregation of the decision result if used. `null` if no
     * aggregation was used.
     */
    public ?int $collectResultValue;

    /**
     * @var string|null The decision instance id of the evaluated root decision. Can be `null` if this
     * instance is the root decision instance of the evaluation.
     */
    public ?string $rootDecisionInstanceId;

    /**
     * @var string|null The process instance id of the root process instance that initiated the evaluation
     * of this decision. Can be `null` if this decision instance is not
     * evaluated as part of a BPMN process.
     */
    public ?string $rootProcessInstanceId;

    /**
     * @var string|null The id of the decision requirements definition that this decision instance belongs
     * to.
     */
    public ?string $decisionRequirementsDefinitionId;

    /**
     * @var string|null The key of the decision requirements definition that this decision instance belongs
     * to.
     */
    public ?string $decisionRequirementsDefinitionKey;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'decisionDefinitionId' => $this->decisionDefinitionId ?? null,
            'decisionDefinitionKey' => $this->decisionDefinitionKey ?? null,
            'decisionDefinitionName' => $this->decisionDefinitionName ?? null,
            'evaluationTime' => $this->evaluationTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'activityId' => $this->activityId ?? null,
            'activityInstanceId' => $this->activityInstanceId ?? null,
            'tenantId' => $this->tenantId ?? null,
            'userId' => $this->userId ?? null,
            'inputs' => $this->inputs ?? null,
            'ouputs' => $this->ouputs ?? null,
            'collectResultValue' => $this->collectResultValue ?? null,
            'rootDecisionInstanceId' => $this->rootDecisionInstanceId ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
            'decisionRequirementsDefinitionId' => $this->decisionRequirementsDefinitionId ?? null,
            'decisionRequirementsDefinitionKey' => $this->decisionRequirementsDefinitionKey ?? null,
        ];
    }

}
