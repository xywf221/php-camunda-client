<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class MigrationExecutionDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var MigrationPlanDto
     */
    public MigrationPlanDto $migrationPlan;

    /**
     * @var array<string>|null A list of process instance ids to migrate.
     */
    public ?array $processInstanceIds;

    /**
     * @var ProcessInstanceQueryDto
     */
    public ProcessInstanceQueryDto $processInstanceQuery;

    /**
     * @var bool|null A boolean value to control whether execution listeners should be invoked during
     * migration.
     */
    public ?bool $skipCustomListeners;

    /**
     * @var bool|null A boolean value to control whether input/output mappings should be executed during
     * migration.
     */
    public ?bool $skipIoMappings;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'migrationPlan' => $this->migrationPlan ?? null,
            'processInstanceIds' => $this->processInstanceIds ?? null,
            'processInstanceQuery' => $this->processInstanceQuery ?? null,
            'skipCustomListeners' => $this->skipCustomListeners ?? null,
            'skipIoMappings' => $this->skipIoMappings ?? null,
        ];
    }

}
