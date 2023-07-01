<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AbstractVendorVersionInformationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Information about the vendor.
     */
    public ?string $vendor;

    /**
     * @var string|null Information about the version.
     */
    public ?string $version;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'vendor' => $this->vendor ?? null,
            'version' => $this->version ?? null,
        ];
    }

}
