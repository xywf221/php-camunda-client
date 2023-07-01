<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoricDecisionOutputInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision output value.
     */
    public ?string $id;

    /**
     * @var string|null The id of the decision instance the output value belongs to.
     */
    public ?string $decisionInstanceId;

    /**
     * @var string|null The id of the clause the output value belongs to.
     */
    public ?string $clauseId;

    /**
     * @var string|null The name of the clause the output value belongs to.
     */
    public ?string $clauseName;

    /**
     * @var string|null The id of the rule the output value belongs to.
     */
    public ?string $ruleId;

    /**
     * @var int|null The order of the rule the output value belongs to.
     */
    public ?int $ruleOrder;

    /**
     * @var string|null An error message in case a Java Serialized Object could not be de-serialized.
     */
    public ?string $errorMessage;

    /**
     * @var string|null The name of the output variable.
     */
    public ?string $variableName;

    /**
     * @var string|null The value type of the variable.
     */
    public ?string $type;

    /**
     * @var string|null The time the variable was inserted.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $createTime;

    /**
     * @var string|null The time after which the entry should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/) `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing this entry.
     */
    public ?string $rootProcessInstanceId;

    /**
     * @var object The variable's value. Value differs depending on the variable's type
     * and on the `disableCustomObjectDeserialization` parameter.
     */
    public object $value;

    /**
     * @var object A JSON object containing additional, value-type-dependent
     * properties.
     *
     * For variables of type `Object`, the following properties are
     * returned:
     * `objectTypeName`: A string representation of the object's type
     * name.
     * `serializationDataFormat`: The serialization format used to store
     * the variable.
     */
    public object $valueInfo;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'decisionInstanceId' => $this->decisionInstanceId ?? null,
            'clauseId' => $this->clauseId ?? null,
            'clauseName' => $this->clauseName ?? null,
            'ruleId' => $this->ruleId ?? null,
            'ruleOrder' => $this->ruleOrder ?? null,
            'errorMessage' => $this->errorMessage ?? null,
            'variableName' => $this->variableName ?? null,
            'type' => $this->type ?? null,
            'createTime' => $this->createTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
            'value' => $this->value ?? null,
            'valueInfo' => $this->valueInfo ?? null,
        ];
    }

}
