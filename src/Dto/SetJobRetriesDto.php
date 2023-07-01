<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class SetJobRetriesDto extends JobRetriesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var array<string>|null A list of job ids to set retries for.
     */
    public ?array $jobIds;

    /**
     * @var JobQueryDto
     */
    public JobQueryDto $jobQuery;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'jobIds' => $this->jobIds ?? null,
            'jobQuery' => $this->jobQuery ?? null,
        ];
    }

}
