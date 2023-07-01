<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MultiFormVariableBinaryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The binary data to be set.
     * For File variables, this multipart can contain the filename, binary value and MIME type of the file variable to be set
     * Only the filename is mandatory.
     */
    public ?string $data;

    /**
     * @var string|null The name of the variable type. Either Bytes for a byte array variable or File for a file variable.
     */
    public ?string $valueType;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'data' => $this->data ?? null,
            'valueType' => $this->valueType ?? null,
        ];
    }

}
