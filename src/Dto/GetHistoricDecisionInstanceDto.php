<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricDecisionInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Include input values in the result.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeInputs;

    /**
     * @var bool|null Include output values in the result.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $includeOutputs;

    /**
     * @var bool|null Disables fetching of byte array input and output values.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $disableBinaryFetching;

    /**
     * @var bool|null Disables deserialization of input and output values that are custom objects.
     * Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $disableCustomObjectDeserialization;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'includeInputs' => $this->includeInputs ?? null,
            'includeOutputs' => $this->includeOutputs ?? null,
            'disableBinaryFetching' => $this->disableBinaryFetching ?? null,
            'disableCustomObjectDeserialization' => $this->disableCustomObjectDeserialization ?? null,
        ];
    }

}
