<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CheckPasswordPolicyResultDto extends PasswordPolicyDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null `true` if the password is compliant with the policy, otherwise `false`.
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
