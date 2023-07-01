<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CamundaFormRef implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The key of the Camunda Form.
     */
    public ?string $key;

    /**
     * @var string|null The binding of the Camunda Form. Can be `latest`, `deployment` or `version`.
     */
    public ?string $binding;

    /**
     * @var int|null The specific version of a Camunda Form. This property is only set if `binding` is `version`.
     */
    public ?int $version;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'key' => $this->key ?? null,
            'binding' => $this->binding ?? null,
            'version' => $this->version ?? null,
        ];
    }

}
