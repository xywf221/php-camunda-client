<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryLicenseKeyDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the customer the license was issued for.
     */
    public ?string $customer;

    /**
     * @var string|null The license type.
     */
    public ?string $type;

    /**
     * @var string|null The expiration date of the license.
     */
    public ?string $validUntil;

    /**
     * @var bool|null Flag that indicates if the license is unlimited.
     */
    public ?bool $unlimited;

    /**
     * @var object A map of features included in the license.
     */
    public object $features;

    /**
     * @var string|null The raw license information.
     */
    public ?string $raw;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'customer' => $this->customer ?? null,
            'type' => $this->type ?? null,
            'valid-until' => $this->validUntil ?? null,
            'unlimited' => $this->unlimited ?? null,
            'features' => $this->features ?? null,
            'raw' => $this->raw ?? null,
        ];
    }

}
