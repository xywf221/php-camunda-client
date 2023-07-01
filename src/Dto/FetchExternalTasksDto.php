<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class FetchExternalTasksDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string **Mandatory.** The id of the worker on which behalf tasks are fetched. The returned tasks are locked for
     * that worker and can only be completed when providing the same worker id.
     */
    public string $workerId;

    /**
     * @var int|null **Mandatory.** The maximum number of tasks to return.
     */
    public ?int $maxTasks;

    /**
     * @var bool|null A `boolean` value, which indicates whether the task should be fetched based on its priority
     * or arbitrarily.
     */
    public ?bool $usePriority;

    /**
     * @var int|null The [Long Polling](https://docs.camunda.org/manual/develop/user-guide/process-engine/external-tasks/#long-polling-to-fetch-and-lock-external-tasks)
     * timeout in milliseconds.
     **Note:** The value cannot be set larger than 1.800.000 milliseconds (corresponds to 30 minutes).
     */
    public ?int $asyncResponseTimeout;

    /**
     * @var array<FetchExternalTaskTopicDto>|null A JSON array of topic objects for which external tasks should be fetched. The returned tasks may be
     * arbitrarily distributed among these topics. Each topic object has the following properties:
     */
    public ?array $topics;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'workerId' => $this->workerId ?? null,
            'maxTasks' => $this->maxTasks ?? null,
            'usePriority' => $this->usePriority ?? null,
            'asyncResponseTimeout' => $this->asyncResponseTimeout ?? null,
            'topics' => $this->topics ?? null,
        ];
    }

}
