<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class DecisionDefinitionDiagramDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the decision definition.
     */
    public ?string $id;

    /**
     * @var string|null An escaped XML string containing the XML that this decision definition was deployed with.
     * Carriage returns, line feeds and quotation marks are escaped.
     */
    public ?string $dmnXml;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'dmnXml' => $this->dmnXml ?? null,
        ];
    }

}
