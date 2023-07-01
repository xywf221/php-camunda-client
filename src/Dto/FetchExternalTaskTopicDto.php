<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class FetchExternalTaskTopicDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory.** The topic's name.
     */
    public string $topicName;

    /**
     * @var int|null **Mandatory.** The duration to lock the external tasks for in milliseconds.
     */
    public ?int $lockDuration;

    /**
     * @var array<string>|null A JSON array of `String` values that represent variable names. For each result task belonging to this
     * topic, the given variables are returned as well if they are accessible from the external task's
     * execution. If not provided - all variables will be fetched.
     */
    public ?array $variables;

    /**
     * @var bool|null If `true` only local variables will be fetched.
     */
    public ?bool $localVariables = false;

    /**
     * @var string|null A `String` value which enables the filtering of tasks based on process instance business key.
     */
    public ?string $businessKey;

    /**
     * @var string|null Filter tasks based on process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var array<string>|null Filter tasks based on process definition ids.
     */
    public ?array $processDefinitionIdIn;

    /**
     * @var string|null Filter tasks based on process definition key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var array<string>|null Filter tasks based on process definition keys.
     */
    public ?array $processDefinitionKeyIn;

    /**
     * @var string|null Filter tasks based on process definition version tag.
     */
    public ?string $processDefinitionVersionTag;

    /**
     * @var bool|null Filter tasks without tenant id.
     */
    public ?bool $withoutTenantId = false;

    /**
     * @var array<string>|null Filter tasks based on tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var object A `JSON` object used for filtering tasks based on process instance variable values. A property name of
     * the object represents a process variable name, while the property value represents the process variable
     * value to filter tasks by.
     */
    public object $processVariables;

    /**
     * @var bool|null Determines whether serializable variable values (typically variables that store custom Java objects)
     * should be deserialized on server side (default `false`).
     *
     * If set to `true`, a serializable variable will be deserialized on server side and transformed to JSON
     * using [Jackson's](https://github.com/FasterXML/jackson) POJO/bean property introspection feature. Note
     * that this requires the Java classes of the variable value to be on the REST API's classpath.
     *
     * If set to `false`, a serializable variable will be returned in its serialized format. For example, a
     * variable that is serialized as XML will be returned as a JSON string containing XML.
     */
    public ?bool $deserializeValues = false;

    /**
     * @var bool|null Determines whether custom extension properties defined in the BPMN activity of the external task (e.g.
     * via the Extensions tab in the Camunda modeler) should be included in the response. Default: false
     */
    public ?bool $includeExtensionProperties = false;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'topicName' => $this->topicName ?? null,
            'lockDuration' => $this->lockDuration ?? null,
            'variables' => $this->variables ?? null,
            'localVariables' => $this->localVariables ?? null,
            'businessKey' => $this->businessKey ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionIdIn' => $this->processDefinitionIdIn ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processDefinitionVersionTag' => $this->processDefinitionVersionTag ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'processVariables' => $this->processVariables ?? null,
            'deserializeValues' => $this->deserializeValues ?? null,
            'includeExtensionProperties' => $this->includeExtensionProperties ?? null,
        ];
    }

}
