<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class PasswordPolicyDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<PasswordPolicyRuleDto>|null An array of password policy rules. Each element of the array is representing one rule of the policy.
     */
    public ?array $rules;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'rules' => $this->rules ?? null,
        ];
    }

}
