<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class PasswordPolicyRuleDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null A placeholder string that contains the name of a password policy rule.
     */
    public ?string $placeholder;

    /**
     * @var object A map that describes the characteristics of a password policy rule, such as the minimum number of digits.
     */
    public object $parameter;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'placeholder' => $this->placeholder ?? null,
            'parameter' => $this->parameter ?? null,
        ];
    }

}
