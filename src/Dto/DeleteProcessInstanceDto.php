<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DeleteProcessInstanceDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null If set to true, the custom listeners will be skipped.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null If set to true, the input/output mappings will be skipped.
     */
    public ?bool $skipIoMappings;

    /**
     * @var bool|null If set to true, subprocesses related to deleted processes will be skipped.
     */
    public ?bool $skipSubprocesses;

    /**
     * @var bool|null If set to false, the request will still be successful if the process id is not found.
     */
    public ?bool $failIfNotExists;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
            'skipSubprocesses' => $this->skipSubprocesses ?? null,
            'failIfNotExists' => $this->failIfNotExists ?? null,
        ];
    }

}
