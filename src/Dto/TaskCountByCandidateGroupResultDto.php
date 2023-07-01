<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TaskCountByCandidateGroupResultDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null The name of the candidate group. If there are tasks without a group name, the value will be `null`
     */
    public ?string $groupName;

    /**
     * @var int|null The number of tasks which have the group name as candidate group.
     */
    public ?int $taskCount;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'groupName' => $this->groupName ?? null,
            'taskCount' => $this->taskCount ?? null,
        ];
    }

}
