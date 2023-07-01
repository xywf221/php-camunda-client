<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeploymentWithDefinitionsDto extends DeploymentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON Object containing a property for each of the process definitions,
     * which are successfully deployed with that deployment.
     * The key is the process definition id, the value is a JSON Object corresponding to the process definition.
     */
    public ?object $deployedProcessDefinitions;

    /**
     * @var object|null A JSON Object containing a property for each of the decision definitions,
     * which are successfully deployed with that deployment.
     * The key is the decision definition id, the value is a JSON Object corresponding to the decision definition.
     */
    public ?object $deployedDecisionDefinitions;

    /**
     * @var object|null A JSON Object containing a property for each of the decision requirements definitions,
     * which are successfully deployed with that deployment.
     * The key is the decision requirements definition id, the value is a JSON Object corresponding to the decision requirements definition.
     */
    public ?object $deployedDecisionRequirementsDefinitions;

    /**
     * @var object|null A JSON Object containing a property for each of the case definitions,
     * which are successfully deployed with that deployment.
     * The key is the case definition id, the value is a JSON Object corresponding to the case definition.
     */
    public ?object $deployedCaseDefinitions;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'deployedProcessDefinitions' => $this->deployedProcessDefinitions ?? null,
            'deployedDecisionDefinitions' => $this->deployedDecisionDefinitions ?? null,
            'deployedDecisionRequirementsDefinitions' => $this->deployedDecisionRequirementsDefinitions ?? null,
            'deployedCaseDefinitions' => $this->deployedCaseDefinitions ?? null,
        ];
    }

}
