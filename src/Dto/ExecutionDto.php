<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExecutionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the Execution.
     */
    public ?string $id;

    /**
     * @var string|null The id of the root of the execution tree representing the process instance.
     */
    public ?string $processInstanceId;

    /**
     * @var bool|null Indicates if the execution is ended.
     */
    public ?bool $ended;

    /**
     * @var string|null The id of the tenant this execution belongs to. Can be `null`
     * if the execution belongs to no single tenant.
     */
    public ?string $tenantId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'ended' => $this->ended ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
