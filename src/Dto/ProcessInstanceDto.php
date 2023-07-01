<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceDto extends LinkableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the process instance.
     */
    public ?string $id;

    /**
     * @var string|null The id of the process definition that this process instance belongs to.
     */
    public ?string $definitionId;

    /**
     * @var string|null The business key of the process instance.
     */
    public ?string $businessKey;

    /**
     * @var string|null The id of the case instance associated with the process instance.
     */
    public ?string $caseInstanceId;

    /**
     * @var bool|null A flag indicating whether the process instance has ended or not. Deprecated: will always be false!
     */
    public ?bool $ended;

    /**
     * @var bool|null A flag indicating whether the process instance is suspended or not.
     */
    public ?bool $suspended;

    /**
     * @var string|null The tenant id of the process instance.
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
            'definitionId' => $this->definitionId ?? null,
            'businessKey' => $this->businessKey ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'ended' => $this->ended ?? null,
            'suspended' => $this->suspended ?? null,
            'tenantId' => $this->tenantId ?? null,
        ];
    }

}
