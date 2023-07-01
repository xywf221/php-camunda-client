<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class GetHistoricTaskInstancesDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Filter by task id.
     */
    public ?string $taskId;

    /**
     * @var string|null Filter by parent task id.
     */
    public ?string $taskParentTaskId;

    /**
     * @var string|null Filter by process instance id.
     */
    public ?string $processInstanceId;

    /**
     * @var string|null Filter by process instance business key.
     */
    public ?string $processInstanceBusinessKey;

    /**
     * @var string|null Filter by process instances with one of the give business keys.
     * The keys need to be in a comma-separated list.
     */
    public ?string $processInstanceBusinessKeyIn;

    /**
     * @var string|null Filter by  process instance business key that has the parameter value as a substring.
     */
    public ?string $processInstanceBusinessKeyLike;

    /**
     * @var string|null Filter by the id of the execution that executed the task.
     */
    public ?string $executionId;

    /**
     * @var string|null Filter by process definition id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Restrict to tasks that belong to a process definition with the given key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var string|null Restrict to tasks that belong to a process definition with the given name.
     */
    public ?string $processDefinitionName;

    /**
     * @var string|null Filter by case instance id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Filter by the id of the case execution that executed the task.
     */
    public ?string $caseExecutionId;

    /**
     * @var string|null Filter by case definition id.
     */
    public ?string $caseDefinitionId;

    /**
     * @var string|null Restrict to tasks that belong to a case definition with the given key.
     */
    public ?string $caseDefinitionKey;

    /**
     * @var string|null Restrict to tasks that belong to a case definition with the given name.
     */
    public ?string $caseDefinitionName;

    /**
     * @var string|null Only include tasks which belong to one of the passed comma-separated activity instance ids.
     */
    public ?string $activityInstanceIdIn;

    /**
     * @var string|null Restrict to tasks that have the given name.
     */
    public ?string $taskName;

    /**
     * @var string|null Restrict to tasks that have a name with the given parameter value as substring.
     */
    public ?string $taskNameLike;

    /**
     * @var string|null Restrict to tasks that have the given description.
     */
    public ?string $taskDescription;

    /**
     * @var string|null Restrict to tasks that have a description that has the parameter value as a substring.
     */
    public ?string $taskDescriptionLike;

    /**
     * @var string|null Restrict to tasks that have the given key.
     */
    public ?string $taskDefinitionKey;

    /**
     * @var string|null Restrict to tasks that have one of the passed comma-separated task definition keys.
     */
    public ?string $taskDefinitionKeyIn;

    /**
     * @var string|null Restrict to tasks that have the given delete reason.
     */
    public ?string $taskDeleteReason;

    /**
     * @var string|null Restrict to tasks that have a delete reason that has the parameter value as a substring.
     */
    public ?string $taskDeleteReasonLike;

    /**
     * @var string|null Restrict to tasks that the given user is assigned to.
     */
    public ?string $taskAssignee;

    /**
     * @var string|null Restrict to tasks that are assigned to users with the parameter value as a substring.
     */
    public ?string $taskAssigneeLike;

    /**
     * @var string|null Restrict to tasks that the given user owns.
     */
    public ?string $taskOwner;

    /**
     * @var string|null Restrict to tasks that are owned by users with the parameter value as a substring.
     */
    public ?string $taskOwnerLike;

    /**
     * @var int|null Restrict to tasks that have the given priority.
     */
    public ?int $taskPriority;

    /**
     * @var bool|null If set to `true`, restricts the query to all tasks that are assigned.
     */
    public ?bool $assigned;

    /**
     * @var bool|null If set to `true`, restricts the query to all tasks that are unassigned.
     */
    public ?bool $unassigned;

    /**
     * @var bool|null Only include finished tasks. Value may only be `true`, as `false` is the default behavior.
     */
    public ?bool $finished;

    /**
     * @var bool|null Only include unfinished tasks. Value may only be `true`, as `false` is the default
     * behavior.
     */
    public ?bool $unfinished;

    /**
     * @var bool|null Only include tasks of finished processes. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $processFinished;

    /**
     * @var bool|null Only include tasks of unfinished processes. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $processUnfinished;

    /**
     * @var string|null Restrict to tasks that are due on the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskDueDate;

    /**
     * @var string|null Restrict to tasks that are due before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskDueDateBefore;

    /**
     * @var string|null Restrict to tasks that are due after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskDueDateAfter;

    /**
     * @var bool|null Only include tasks which have no due date. Value may only be `true`, as `false` is the
     * default behavior.
     */
    public ?bool $withoutTaskDueDate;

    /**
     * @var string|null Restrict to tasks that have a followUp date on the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskFollowUpDate;

    /**
     * @var string|null Restrict to tasks that have a followUp date before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskFollowUpDateBefore;

    /**
     * @var string|null Restrict to tasks that have a followUp date after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $taskFollowUpDateAfter;

    /**
     * @var string|null Restrict to tasks that were started before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedBefore;

    /**
     * @var string|null Restrict to tasks that were started after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $startedAfter;

    /**
     * @var string|null Restrict to tasks that were finished before the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedBefore;

    /**
     * @var string|null Restrict to tasks that were finished after the given date. By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/),
     * the date must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`,
     * e.g., `2013-01-23T14:42:45.000+0200`.
     */
    public ?string $finishedAfter;

    /**
     * @var string|null Filter by a comma-separated list of tenant ids. A task instance must have one of the given
     * tenant ids.
     */
    public ?string $tenantIdIn;

    /**
     * @var bool|null Only include historic task instances that belong to no tenant. Value may only be
     * `true`, as `false` is the default behavior.
     */
    public ?bool $withoutTenantId;

    /**
     * @var string|null Only include tasks that have variables with certain values. Variable filtering expressions are
     * comma-separated and are structured as follows:
     *
     * A valid parameter value has the form `key_operator_value`.
     * `key` is the variable name, `operator` is the comparison operator to be used
     * and `value` the variable value.
     **Note:** Values are always treated as `String` objects on server side.
     *
     *
     * Valid operator values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`.
     *
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $taskVariables;

    /**
     * @var string|null Only include tasks that belong to process instances that have variables with certain
     * values. Variable filtering expressions are comma-separated and are structured as
     * follows:
     *
     * A valid parameter value has the form `key_operator_value`.
     * `key` is the variable name, `operator` is the comparison operator to be used
     * and `value` the variable value.
     **Note:** Values are always treated as `String` objects on server side.
     *
     *
     * Valid operator values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`;
     * `notLike`.
     *
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?string $processVariables;

    /**
     * @var bool|null Match the variable name provided in `taskVariables` and `processVariables` case-
     * insensitively. If set to `true` **variableName** and **variablename** are
     * treated as equal.
     */
    public ?bool $variableNamesIgnoreCase;

    /**
     * @var bool|null Match the variable value provided in `taskVariables` and `processVariables` case-
     * insensitively. If set to `true` **variableValue** and **variablevalue** are
     * treated as equal.
     */
    public ?bool $variableValuesIgnoreCase;

    /**
     * @var string|null Restrict to tasks with a historic identity link to the given user.
     */
    public ?string $taskInvolvedUser;

    /**
     * @var string|null Restrict to tasks with a historic identity link to the given group.
     */
    public ?string $taskInvolvedGroup;

    /**
     * @var string|null Restrict to tasks with a historic identity link to the given candidate user.
     */
    public ?string $taskHadCandidateUser;

    /**
     * @var string|null Restrict to tasks with a historic identity link to the given candidate group.
     */
    public ?string $taskHadCandidateGroup;

    /**
     * @var bool|null Only include tasks which have a candidate group. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withCandidateGroups;

    /**
     * @var bool|null Only include tasks which have no candidate group. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withoutCandidateGroups;

    /**
     * @var string|null Sort the results lexicographically by a given criterion.
     * Must be used in conjunction with the sortOrder parameter.
     */
    public ?string $sortBy;

    /**
     * @var string|null Sort the results in a given order. Values may be asc for ascending order or desc for descending order.
     * Must be used in conjunction with the sortBy parameter.
     */
    public ?string $sortOrder;

    /**
     * @var int|null Pagination of results. Specifies the index of the first result to return.
     */
    public ?int $firstResult;

    /**
     * @var int|null Pagination of results. Specifies the maximum number of results to return.
     * Will return less results if there are no more results left.
     */
    public ?int $maxResults;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'taskId' => $this->taskId ?? null,
            'taskParentTaskId' => $this->taskParentTaskId ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceBusinessKey' => $this->processInstanceBusinessKey ?? null,
            'processInstanceBusinessKeyIn' => $this->processInstanceBusinessKeyIn ?? null,
            'processInstanceBusinessKeyLike' => $this->processInstanceBusinessKeyLike ?? null,
            'executionId' => $this->executionId ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseDefinitionName' => $this->caseDefinitionName ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'taskName' => $this->taskName ?? null,
            'taskNameLike' => $this->taskNameLike ?? null,
            'taskDescription' => $this->taskDescription ?? null,
            'taskDescriptionLike' => $this->taskDescriptionLike ?? null,
            'taskDefinitionKey' => $this->taskDefinitionKey ?? null,
            'taskDefinitionKeyIn' => $this->taskDefinitionKeyIn ?? null,
            'taskDeleteReason' => $this->taskDeleteReason ?? null,
            'taskDeleteReasonLike' => $this->taskDeleteReasonLike ?? null,
            'taskAssignee' => $this->taskAssignee ?? null,
            'taskAssigneeLike' => $this->taskAssigneeLike ?? null,
            'taskOwner' => $this->taskOwner ?? null,
            'taskOwnerLike' => $this->taskOwnerLike ?? null,
            'taskPriority' => $this->taskPriority ?? null,
            'assigned' => $this->assigned ?? null,
            'unassigned' => $this->unassigned ?? null,
            'finished' => $this->finished ?? null,
            'unfinished' => $this->unfinished ?? null,
            'processFinished' => $this->processFinished ?? null,
            'processUnfinished' => $this->processUnfinished ?? null,
            'taskDueDate' => $this->taskDueDate ?? null,
            'taskDueDateBefore' => $this->taskDueDateBefore ?? null,
            'taskDueDateAfter' => $this->taskDueDateAfter ?? null,
            'withoutTaskDueDate' => $this->withoutTaskDueDate ?? null,
            'taskFollowUpDate' => $this->taskFollowUpDate ?? null,
            'taskFollowUpDateBefore' => $this->taskFollowUpDateBefore ?? null,
            'taskFollowUpDateAfter' => $this->taskFollowUpDateAfter ?? null,
            'startedBefore' => $this->startedBefore ?? null,
            'startedAfter' => $this->startedAfter ?? null,
            'finishedBefore' => $this->finishedBefore ?? null,
            'finishedAfter' => $this->finishedAfter ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'taskVariables' => $this->taskVariables ?? null,
            'processVariables' => $this->processVariables ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'taskInvolvedUser' => $this->taskInvolvedUser ?? null,
            'taskInvolvedGroup' => $this->taskInvolvedGroup ?? null,
            'taskHadCandidateUser' => $this->taskHadCandidateUser ?? null,
            'taskHadCandidateGroup' => $this->taskHadCandidateGroup ?? null,
            'withCandidateGroups' => $this->withCandidateGroups ?? null,
            'withoutCandidateGroups' => $this->withoutCandidateGroups ?? null,
            'sortBy' => $this->sortBy ?? null,
            'sortOrder' => $this->sortOrder ?? null,
            'firstResult' => $this->firstResult ?? null,
            'maxResults' => $this->maxResults ?? null,
        ];
    }

}
