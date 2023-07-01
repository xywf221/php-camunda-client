<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AnnotationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The annotation value to put.
     */
    public ?string $annotation;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'annotation' => $this->annotation ?? null,
        ];
    }

}
