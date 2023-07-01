<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessDefinitionSuspensionStateDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null A `Boolean` value which indicates whether to activate or suspend all process definitions with the given key.
     * When the value is set to `true`, all process definitions with the given key will be suspended and
     * when the value is set to `false`, all process definitions with the given key will be activated.
     */
    public ?bool $suspended;

    /**
     * @var string|null The id of the process definitions to activate or suspend.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null The key of the process definitions to activate or suspend.
     */
    public ?string $processDefinitionKey;

    /**
     * @var bool|null A `Boolean` value which indicates whether to activate or suspend also all process instances of
     * the process definitions with the given key.
     * When the value is set to `true`, all process instances of the process definitions with the given key
     * will be activated or suspended and when the value is set to `false`, the suspension state of
     * all process instances of the process definitions with the given key will not be updated.
     */
    public ?bool $includeProcessInstances;

    /**
     * @var string|null The date on which all process definitions with the given key will be activated or suspended.
     * If `null`, the suspension state of all process definitions with the given key is updated immediately.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $executionDate;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'suspended' => $this->suspended ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'includeProcessInstances' => $this->includeProcessInstances ?? null,
            'executionDate' => $this->executionDate ?? null,
        ];
    }

}
