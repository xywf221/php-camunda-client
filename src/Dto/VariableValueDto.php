<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class VariableValueDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var string|null The value type of the variable.
     */
    public ?string $type;

    /**
     * @var object A JSON object containing additional, value-type-dependent properties.
     * For serialized variables of type Object, the following properties can be provided:
     * `objectTypeName`: A string representation of the object's type name.
     * `serializationDataFormat`: The serialization format used to store the variable.
     *
     * For serialized variables of type File, the following properties can be provided:
     * `filename`: The name of the file. This is not the variable name but the name that will be used when downloading the file again.
     * `mimetype`: The MIME type of the file that is being uploaded.
     * `encoding`: The encoding of the file that is being uploaded.
     *
     * The following property can be provided for all value types:
     * `transient`: Indicates whether the variable should be transient or
     * not. See [documentation](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables#transient-variables) for more informations.
     * (Not applicable for `decision-definition`, ` /process-instance/variables-async`, and `/migration/executeAsync` endpoints)
     */
    public object $valueInfo;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'value' => $this->value ?? null,
            'type' => $this->type ?? null,
            'valueInfo' => $this->valueInfo ?? null,
        ];
    }

}
