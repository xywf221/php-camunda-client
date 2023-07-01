<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ProcessDefinitionDiagramDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the process definition.
     */
    public ?string $id;

    /**
     * @var string|null An escaped XML string containing the XML that this definition was deployed with.
     * Carriage returns, line feeds and quotation marks are escaped.
     */
    public ?string $bpmn20Xml;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'bpmn20Xml' => $this->bpmn20Xml ?? null,
        ];
    }

}
