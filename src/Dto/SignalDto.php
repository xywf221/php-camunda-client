<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SignalDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string The name of the signal to deliver.
     **Note**: This property is mandatory.
     */
    public string $name;

    /**
     * @var string|null Optionally specifies a single execution which is notified by the signal.
     **Note**: If no execution id is defined the signal is broadcasted to all subscribed
     * handlers.
     */
    public ?string $executionId;

    /**
     * @var object|null A JSON object containing variable key-value pairs. Each key is a variable name and
     * each value a JSON variable value object.
     */
    public ?object $variables;

    /**
     * @var string|null Specifies a tenant to deliver the signal. The signal can only be received on
     * executions or process definitions which belongs to the given tenant.
     **Note**: Cannot be used in combination with executionId.
     */
    public ?string $tenantId;

    /**
     * @var bool|null If true the signal can only be received on executions or process definitions which
     * belongs to no tenant. Value may not be false as this is the default behavior.
     **Note**: Cannot be used in combination with `executionId`.
     */
    public ?bool $withoutTenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'name' => $this->name ?? null,
            'executionId' => $this->executionId ?? null,
            'variables' => $this->variables ?? null,
            'tenantId' => $this->tenantId ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
        ];
    }

}
