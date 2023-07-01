<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class QueryVariableInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var int|null Pagination of results. Specifies the index of the first result to return.
     */
    public ?int $firstResult;

    /**
     * @var int|null Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     */
    public ?int $maxResults;

    /**
     * @var bool|null Determines whether serializable variable values (typically variables that
     * store custom Java objects) should be deserialized on server side (default
     * `true`).
     *
     * If set to `true`, a serializable variable will be deserialized on server side
     * and transformed to JSON using
     * [Jackson's](https://github.com/FasterXML/jackson) POJO/bean property
     * introspection feature. Note that this requires the Java classes of the
     * variable value to be on the REST API's classpath.
     *
     * If set to `false`, a serializable variable will be returned in its serialized
     * format. For example, a variable that is serialized as XML will be returned as
     * a JSON string containing XML.
     **Note:** While `true` is the default value for reasons of backward
     * compatibility, we recommend setting this parameter to `false` when developing
     * web applications that are independent of the Java process applications
     * deployed to the engine.
     */
    public ?bool $deserializeValues;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
            'deserializeValues' => $this->deserializeValues ?? null,
        ];
    }

}
