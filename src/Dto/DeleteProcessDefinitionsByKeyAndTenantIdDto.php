<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteProcessDefinitionsByKeyAndTenantIdDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null `true`, if all process instances, historic process instances and jobs
     * for this process definition should be deleted.
     */
    public ?bool $cascade;

    /**
     * @var bool|null `true`, if only the built-in ExecutionListeners should be notified with the end event.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null A boolean value to control whether input/output mappings should be executed during deletion.
     * `true`, if input/output mappings should not be invoked.
     */
    public ?bool $skipIoMappings;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'cascade' => $this->cascade ?? null,
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
        ];
    }

}
