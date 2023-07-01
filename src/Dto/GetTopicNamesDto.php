<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetTopicNamesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var bool|null Only include external tasks that are currently locked (i.e., they have a lock time and it has not expired).
     * Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $withLockedTasks;

    /**
     * @var bool|null Only include external tasks that are currently not locked (i.e., they have no lock or it has expired).
     * Value may only be `true`, as `false` matches any external task.
     */
    public ?bool $withUnlockedTasks;

    /**
     * @var bool|null Only include external tasks that have a positive (&gt; 0) number of retries (or `null`). Value may only be
     * `true`, as `false` matches any external task.
     */
    public ?bool $withRetriesLeft;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'withLockedTasks' => $this->withLockedTasks ?? null,
            'withUnlockedTasks' => $this->withUnlockedTasks ?? null,
            'withRetriesLeft' => $this->withRetriesLeft ?? null,
        ];
    }

}
