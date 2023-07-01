<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class ExternalTaskFailureDto extends HandleExternalTaskDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null An message indicating the reason of the failure.
     */
    public ?string $errorMessage;

    /**
     * @var string|null A detailed error description.
     */
    public ?string $errorDetails;

    /**
     * @var int|null A number of how often the task should be retried. Must be >= 0. If this is 0, an incident is created and
     * the task cannot be fetched anymore unless the retries are increased again. The incident's message is set
     * to the `errorMessage` parameter.
     */
    public ?int $retries;

    /**
     * @var int|null A timeout in milliseconds before the external task becomes available again for fetching. Must be >= 0.
     */
    public ?int $retryTimeout;

    /**
     * @var object|null A JSON object containing variable key-value pairs. Each key is a variable name and each value a JSON variable value object with the following properties:
     */
    public ?object $variables;

    /**
     * @var object|null A JSON object containing local variable key-value pairs. Local variables are set only in the scope of external task. Each key is a variable name and each value a JSON variable value object with the following properties:
     */
    public ?object $localVariables;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'errorMessage' => $this->errorMessage ?? null,
            'errorDetails' => $this->errorDetails ?? null,
            'retries' => $this->retries ?? null,
            'retryTimeout' => $this->retryTimeout ?? null,
            'variables' => $this->variables ?? null,
            'localVariables' => $this->localVariables ?? null,
        ];
    }

}
