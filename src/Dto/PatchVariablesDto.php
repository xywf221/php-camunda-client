<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class PatchVariablesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null A JSON object containing variable key-value pairs.
     */
    public ?object $modifications;

    /**
     * @var array<string>|null An array of String keys of variables to be deleted.
     */
    public ?array $deletions;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'modifications' => $this->modifications ?? null,
            'deletions' => $this->deletions ?? null,
        ];
    }

}
