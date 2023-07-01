<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessInstanceModificationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Skip execution listener invocation for activities that are started or ended as part of this request.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null Skip execution of [input/output variable mappings](https://docs.camunda.org/manual/develop/user-guide/process-engine/variables/#input-output-variable-mapping)
     * for activities that are started or ended as part of this request.
     */
    public ?bool $skipIoMappings;

    /**
     * @var array<ProcessInstanceModificationInstructionDto>|null JSON array of modification instructions. The instructions are executed in the order they are in.
     */
    public ?array $instructions;

    /**
     * @var string|null An arbitrary text annotation set by a user for auditing reasons.
     */
    public ?string $annotation;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
            'instructions' => $this->instructions ?? null,
            'annotation' => $this->annotation ?? null,
        ];
    }

}
