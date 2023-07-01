<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AbstractSetRemovalTimeDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The date for which the instances shall be removed. Value may not be `null`.
     **Note:** Cannot be set in conjunction with `clearedRemovalTime` or `calculatedRemovalTime`.
     */
    public ?string $absoluteRemovalTime;

    /**
     * @var bool|null Sets the removal time to `null`. Value may only be `true`, as `false` is the default behavior.
     **Note:** Cannot be set in conjunction with `absoluteRemovalTime` or `calculatedRemovalTime`.
     */
    public ?bool $clearedRemovalTime;

    /**
     * @var bool|null The removal time is calculated based on the engine's configuration settings. Value may only be `true`, as `false` is the default behavior.
     **Note:** Cannot be set in conjunction with `absoluteRemovalTime` or `clearedRemovalTime`.
     */
    public ?bool $calculatedRemovalTime;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'absoluteRemovalTime' => $this->absoluteRemovalTime ?? null,
            'clearedRemovalTime' => $this->clearedRemovalTime ?? null,
            'calculatedRemovalTime' => $this->calculatedRemovalTime ?? null,
        ];
    }

}
