<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExceptionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An exception class indicating the occurred error.
     */
    public ?string $type;

    /**
     * @var string|null A detailed message of the error.
     */
    public ?string $message;

    /**
     * @var int The code allows your client application to identify the error in an automated fashion.
     * You can look up the meaning of all built-in codes and learn how to add custom codes
     * in the [User Guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/error-handling/#exception-codes).
     */
    public int $code;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'type' => $this->type ?? null,
            'message' => $this->message ?? null,
            'code' => $this->code ?? null,
        ];
    }

}
