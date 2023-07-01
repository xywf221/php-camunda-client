<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MultiFormAttachmentDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the attachment.
     */
    public ?string $attachmentName;

    /**
     * @var string|null The description of the attachment.
     */
    public ?string $attachmentDescription;

    /**
     * @var string|null The type of the attachment.
     */
    public ?string $attachmentType;

    /**
     * @var string|null The url to the remote content of the attachment.
     */
    public ?string $url;

    /**
     * @var string|null The content of the attachment.
     */
    public ?string $content;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'attachment-name' => $this->attachmentName ?? null,
            'attachment-description' => $this->attachmentDescription ?? null,
            'attachment-type' => $this->attachmentType ?? null,
            'url' => $this->url ?? null,
            'content' => $this->content ?? null,
        ];
    }

}
