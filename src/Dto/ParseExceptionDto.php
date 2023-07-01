<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ParseExceptionDto extends ExceptionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON Object containing list of errors and warnings occurred during deployment.
     */
    public ?object $details;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'details' => $this->details ?? null,
        ];
    }

}
