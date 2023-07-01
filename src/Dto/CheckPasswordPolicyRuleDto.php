<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CheckPasswordPolicyRuleDto extends PasswordPolicyRuleDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null `true` if the password is compliant with this rule, otherwise `false`.
     */
    public ?bool $valid;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'valid' => $this->valid ?? null,
        ];
    }

}
