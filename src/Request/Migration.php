<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Migration extends BaseClient
{
    /**
     * Execute Migration Plan
     *
     * Executes a migration plan synchronously for multiple process instances. To execute
     * a migration plan asynchronously, use the
     * [Execute Migration Plan Async(Batch)](https://docs.camunda.org/manual/develop/reference/rest/migration/execute-migration-async/)
     * method.
     *
     * For more information about the difference between synchronous and asynchronous
     * execution of a migration plan, please refer to the related section of
     * [the user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-migration/#executing-a-migration-plan).
     *
     * @param MigrationExecutionDto $bodyDto
     * @throws GuzzleException
     */
    public function executeMigrationPlan(MigrationExecutionDto $bodyDto): void
    {
        $this->client->post("/engine-rest/migration/execute", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Execute Migration Plan Async (Batch)
     *
     * Executes a migration plan asynchronously (batch) for multiple process instances.
     * To execute a migration plan synchronously, use the
     * [Execute MigrationPlan](https://docs.camunda.org/manual/develop/reference/rest/migration/execute-migration/)
     * method.
     *
     * For more information about the difference between synchronous and asynchronous
     * execution of a migration plan, please refer to the related section of
     * [the user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-migration/#executing-a-migration-plan).
     *
     * @param MigrationExecutionDto $bodyDto
     * @return BatchDto
     * @throws GuzzleException
     */
    public function executeMigrationPlanAsync(MigrationExecutionDto $bodyDto): BatchDto
    {
        $response = $this->client->post("/engine-rest/migration/executeAsync", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, BatchDto::class);
    }

    /**
     * Generate Migration Plan
     *
     * Generates a migration plan for two process definitions. The generated migration
     * plan contains migration instructions which map equal activities
     * between the
     * two process definitions.
     *
     * @param MigrationPlanGenerationDto $bodyDto
     * @return MigrationPlanDto
     * @throws GuzzleException
     */
    public function generateMigrationPlan(MigrationPlanGenerationDto $bodyDto): MigrationPlanDto
    {
        $response = $this->client->post("/engine-rest/migration/generate", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, MigrationPlanDto::class);
    }

    /**
     * Validate Migration Plan
     *
     * Validates a migration plan statically without executing it. This
     * corresponds to the
     * [creation time validation](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-instance-migration/#creation-time-validation)
     * described in the user guide.
     *
     * @param MigrationPlanDto $bodyDto
     * @return MigrationPlanReportDto
     * @throws GuzzleException
     */
    public function validateMigrationPlan(MigrationPlanDto $bodyDto): MigrationPlanReportDto
    {
        $response = $this->client->post("/engine-rest/migration/validate", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, MigrationPlanReportDto::class);
    }
}