<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class AttachmentDto extends LinkableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the task attachment.
     */
    public ?string $id;

    /**
     * @var string|null The name of the task attachment.
     */
    public ?string $name;

    /**
     * @var string|null The description of the task attachment.
     */
    public ?string $description;

    /**
     * @var string|null The id of the task to which the attachment belongs.
     */
    public ?string $taskId;

    /**
     * @var string|null Indication of the type of content that this attachment refers to.
     * Can be MIME type or any other indication.
     */
    public ?string $type;

    /**
     * @var string|null The url to the remote content of the task attachment.
     */
    public ?string $url;

    /**
     * @var string|null The time the variable was inserted.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $createTime;

    /**
     * @var string|null The time after which the attachment should be removed by the History Cleanup job.
     * [Default format](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process containing the task.
     */
    public ?string $rootProcessInstanceId;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'description' => $this->description ?? null,
            'taskId' => $this->taskId ?? null,
            'type' => $this->type ?? null,
            'url' => $this->url ?? null,
            'createTime' => $this->createTime ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
