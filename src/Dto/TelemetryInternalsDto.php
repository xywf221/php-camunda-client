<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TelemetryInternalsDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var object|null Vendor and version of the connected database.
     */
    public ?object $database;

    /**
     * @var object|null Vendor and version of the application server.
     */
    public ?object $applicationServer;

    /**
     * @var object|null Information about the Camunda license key.
     */
    public ?object $licenseKey;

    /**
     * @var array<string>|null List of Camunda integrations used (e.g., Camunda Spring Boot Starter, Camunda Run, WildFly/JBoss subsystem, Camunda EJB).
     */
    public ?array $camundaIntegration;

    /**
     * @var object|null The count of executed commands after the last retrieved data.
     */
    public ?object $commands;

    /**
     * @var object|null The collected metrics are the number of root process instance executions started, the number of activity instances started or also known as flow node instances, and the number of executed decision instances and elements.
     */
    public ?object $metrics;

    /**
     * @var array<string>|null The webapps enabled in this installation of Camunda.
     */
    public ?array $webapps;

    /**
     * @var object|null Vendor and version of the installed JDK.
     */
    public ?object $jdk;

    /**
     * @var string The date when the engine started to collect dynamic data, such as command executions and metrics. If telemetry sending is enabled, dynamic data resets on sending the data to Camunda.
     * Dynamic data and the date returned by this method are reset in three cases: engine startup, after engine start when sending telemetry data to Camunda is enabled via API, after sending telemetry data to Camunda (only when this was enabled)
     * The date is in the format <code>YYYY-MM-DD'T'HH:mm:ss.SSSZ</code>.
     */
    public string $dataCollectionStartDate;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'database' => $this->database ?? null,
            'application-server' => $this->applicationServer ?? null,
            'license-key' => $this->licenseKey ?? null,
            'camunda-integration' => $this->camundaIntegration ?? null,
            'commands' => $this->commands ?? null,
            'metrics' => $this->metrics ?? null,
            'webapps' => $this->webapps ?? null,
            'jdk' => $this->jdk ?? null,
            'data-collection-start-date' => $this->dataCollectionStartDate ?? null,
        ];
    }

}
