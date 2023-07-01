<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class CommentDto extends LinkableDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The id of the task comment.
     */
    public ?string $id;

    /**
     * @var string|null The id of the user who created the comment.
     */
    public ?string $userId;

    /**
     * @var string|null The id of the task to which the comment belongs.
     */
    public ?string $taskId;

    /**
     * @var string|null The id of the process instance the comment is related to.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null The time when the comment was created.
     * [Default format]($(docsUrl)/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $time;

    /**
     * @var string|null The content of the comment.
     */
    public ?string $message;

    /**
     * @var string|null The time after which the comment should be removed by the History Cleanup job.
     * [Default format]($(docsUrl)/reference/rest/overview/date-format/)
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`.
     */
    public ?string $removalTime;

    /**
     * @var string|null The process instance id of the root process instance that initiated the process
     * containing the task.
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
            'userId' => $this->userId ?? null,
            'taskId' => $this->taskId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'time' => $this->time ?? null,
            'message' => $this->message ?? null,
            'removalTime' => $this->removalTime ?? null,
            'rootProcessInstanceId' => $this->rootProcessInstanceId ?? null,
        ];
    }

}
