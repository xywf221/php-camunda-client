<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetLocalExecutionVariablesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Determines whether serializable variable values (typically
     * variables that store custom Java objects) should be deserialized
     * on server side (default `true`).
     *
     * If set to `true`, a serializable variable will be deserialized on
     * server side and transformed to JSON using
     * [Jackson's](https://github.com/FasterXML/jackson) POJO/bean
     * property introspection feature. Note that this requires the Java
     * classes of the variable value to be on the REST API's classpath.
     *
     * If set to `false`, a serializable variable will be returned in its
     * serialized format. For example, a variable that is serialized as
     * XML will be returned as a JSON string containing XML.
     **Note:** While `true` is the default value for reasons of
     * backward compatibility, we recommend setting this parameter to
     * `false` when developing web applications that are independent of
     * the Java process applications deployed to the engine.
     */
    public ?bool $deserializeValues;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'deserializeValues' => $this->deserializeValues ?? null,
        ];
    }

}
