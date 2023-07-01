<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class FormDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The form key.
     */
    public ?string $key;

    /**
     * @var string|null The context path of the process application. If the task (or the process definition) does not
     * belong to a process application deployment or a process definition at all, this
     * property is not set.
     */
    public ?string $contextPath;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'key' => $this->key ?? null,
            'contextPath' => $this->contextPath ?? null,
        ];
    }

}
