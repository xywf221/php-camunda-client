<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class HistoryCleanupConfigurationDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Start time of the current or next batch window. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $batchWindowStartTime;

    /**
     * @var string|null End time of the current or next batch window. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $batchWindowEndTime;

    /**
     * @var bool|null Indicates whether the engine node participates in history cleanup or
     * not. The default is `true`. Participation can be disabled via
     * [Process Engine Configuration](https://docs.camunda.org/manual/develop/reference/deployment-descriptors/tags/process-engine/#history-cleanup-enabled).
     *
     * For more details, see
     * [Cleanup Execution Participation per Node](https://docs.camunda.org/manual/develop/user-guide/process-engine/history/#cleanup-execution-participation-per-node).
     */
    public ?bool $enabled;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'batchWindowStartTime' => $this->batchWindowStartTime ?? null,
            'batchWindowEndTime' => $this->batchWindowEndTime ?? null,
            'enabled' => $this->enabled ?? null,
        ];
    }

}
