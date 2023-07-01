<?php

namespace Camunda\Dto;

use Camunda\RequestPropertiesInterface;
use JsonSerializable;

class TaskQueryDto implements JsonSerializable, RequestPropertiesInterface
{

    /**
     * @var string|null Restrict to task with the given id.
     */
    public ?string $taskId;

    /**
     * @var array<string>|null Restrict to tasks with any of the given ids.
     */
    public ?array $taskIdIn;

    /**
     * @var string|null Restrict to tasks that belong to process instances with the given id.
     */
    public ?string $processInstanceId;

    /**
     * @var array<string>|null Restrict to tasks that belong to process instances with the given ids.
     */
    public ?array $processInstanceIdIn;

    /**
     * @var string|null Restrict to tasks that belong to process instances with the given business key.
     */
    public ?string $processInstanceBusinessKey;

    /**
     * @var string|null Restrict to tasks that belong to process instances with the given business key which
     * is described by an expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $processInstanceBusinessKeyExpression;

    /**
     * @var array<string>|null Restrict to tasks that belong to process instances with one of the give business keys.
     * The keys need to be in a comma-separated list.
     */
    public ?array $processInstanceBusinessKeyIn;

    /**
     * @var string|null Restrict to tasks that have a process instance business key that has the parameter
     * value as a substring.
     */
    public ?string $processInstanceBusinessKeyLike;

    /**
     * @var string|null Restrict to tasks that have a process instance business key that has the parameter
     * value as a substring and is described by an expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $processInstanceBusinessKeyLikeExpression;

    /**
     * @var string|null Restrict to tasks that belong to a process definition with the given id.
     */
    public ?string $processDefinitionId;

    /**
     * @var string|null Restrict to tasks that belong to a process definition with the given key.
     */
    public ?string $processDefinitionKey;

    /**
     * @var array<string>|null Restrict to tasks that belong to a process definition with one of the given keys. The
     * keys need to be in a comma-separated list.
     */
    public ?array $processDefinitionKeyIn;

    /**
     * @var string|null Restrict to tasks that belong to a process definition with the given name.
     */
    public ?string $processDefinitionName;

    /**
     * @var string|null Restrict to tasks that have a process definition name that has the parameter value as
     * a substring.
     */
    public ?string $processDefinitionNameLike;

    /**
     * @var string|null Restrict to tasks that belong to an execution with the given id.
     */
    public ?string $executionId;

    /**
     * @var string|null Restrict to tasks that belong to case instances with the given id.
     */
    public ?string $caseInstanceId;

    /**
     * @var string|null Restrict to tasks that belong to case instances with the given business key.
     */
    public ?string $caseInstanceBusinessKey;

    /**
     * @var string|null Restrict to tasks that have a case instance business key that has the parameter value
     * as a substring.
     */
    public ?string $caseInstanceBusinessKeyLike;

    /**
     * @var string|null Restrict to tasks that belong to a case definition with the given id.
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
     * @var string|null Restrict to tasks that have a case definition name that has the parameter value as a
     * substring.
     */
    public ?string $caseDefinitionNameLike;

    /**
     * @var string|null Restrict to tasks that belong to a case execution with the given id.
     */
    public ?string $caseExecutionId;

    /**
     * @var array<string>|null Only include tasks which belong to one of the passed and comma-separated activity
     * instance ids.
     */
    public ?array $activityInstanceIdIn;

    /**
     * @var array<string>|null Only include tasks which belong to one of the passed and comma-separated
     * tenant ids.
     */
    public ?array $tenantIdIn;

    /**
     * @var bool|null Only include tasks which belong to no tenant. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withoutTenantId = false;

    /**
     * @var string|null Restrict to tasks that the given user is assigned to.
     */
    public ?string $assignee;

    /**
     * @var string|null Restrict to tasks that the user described by the given expression is assigned to. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $assigneeExpression;

    /**
     * @var string|null Restrict to tasks that have an assignee that has the parameter
     * value as a substring.
     */
    public ?string $assigneeLike;

    /**
     * @var string|null Restrict to tasks that have an assignee that has the parameter value described by the
     * given expression as a substring. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $assigneeLikeExpression;

    /**
     * @var array<string>|null Only include tasks which are assigned to one of the passed and comma-separated user ids.
     */
    public ?array $assigneeIn;

    /**
     * @var array<string>|null Only include tasks which are not assigned to one of the passed and comma-separated user ids.
     */
    public ?array $assigneeNotIn;

    /**
     * @var string|null Restrict to tasks that the given user owns.
     */
    public ?string $owner;

    /**
     * @var string|null Restrict to tasks that the user described by the given expression owns. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $ownerExpression;

    /**
     * @var string|null Only include tasks that are offered to the given group.
     */
    public ?string $candidateGroup;

    /**
     * @var string|null Only include tasks that are offered to the group described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $candidateGroupExpression;

    /**
     * @var string|null Only include tasks that are offered to the given user or to one of his groups.
     */
    public ?string $candidateUser;

    /**
     * @var string|null Only include tasks that are offered to the user described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $candidateUserExpression;

    /**
     * @var bool|null Also include tasks that are assigned to users in candidate queries. Default is to only
     * include tasks that are not assigned to any user if you query by candidate user or
     * group(s).
     */
    public ?bool $includeAssignedTasks = false;

    /**
     * @var string|null Only include tasks that the given user is involved in. A user is involved in a task if
     * an identity link exists between task and user (e.g., the user is the assignee).
     */
    public ?string $involvedUser;

    /**
     * @var string|null Only include tasks that the user described by the given expression is involved in.
     * A user is involved in a task if an identity link exists between task and user
     * (e.g., the user is the assignee). See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions.
     */
    public ?string $involvedUserExpression;

    /**
     * @var bool|null If set to `true`, restricts the query to all tasks that are assigned.
     */
    public ?bool $assigned = false;

    /**
     * @var bool|null If set to `true`, restricts the query to all tasks that are unassigned.
     */
    public ?bool $unassigned = false;

    /**
     * @var string|null Restrict to tasks that have the given key.
     */
    public ?string $taskDefinitionKey;

    /**
     * @var array<string>|null Restrict to tasks that have one of the given keys. The keys need to be in a comma-separated list.
     */
    public ?array $taskDefinitionKeyIn;

    /**
     * @var string|null Restrict to tasks that have a key that has the parameter value as a substring.
     */
    public ?string $taskDefinitionKeyLike;

    /**
     * @var string|null Restrict to tasks that have the given name.
     */
    public ?string $name;

    /**
     * @var string|null Restrict to tasks that do not have the given name.
     */
    public ?string $nameNotEqual;

    /**
     * @var string|null Restrict to tasks that have a name with the given parameter value as substring.
     */
    public ?string $nameLike;

    /**
     * @var string|null Restrict to tasks that do not have a name with the given parameter
     * value as substring.
     */
    public ?string $nameNotLike;

    /**
     * @var string|null Restrict to tasks that have the given description.
     */
    public ?string $description;

    /**
     * @var string|null Restrict to tasks that have a description that has the parameter
     * value as a substring.
     */
    public ?string $descriptionLike;

    /**
     * @var int|null Restrict to tasks that have the given priority.
     */
    public ?int $priority;

    /**
     * @var int|null Restrict to tasks that have a lower or equal priority.
     */
    public ?int $maxPriority;

    /**
     * @var int|null Restrict to tasks that have a higher or equal priority.
     */
    public ?int $minPriority;

    /**
     * @var string|null Restrict to tasks that are due on the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have the format
     * `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.546+0200`.
     */
    public ?string $dueDate;

    /**
     * @var string|null Restrict to tasks that are due on the date described by the given expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $dueDateExpression;

    /**
     * @var string|null Restrict to tasks that are due after the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.435+0200`.
     */
    public ?string $dueAfter;

    /**
     * @var string|null Restrict to tasks that are due after the date described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $dueAfterExpression;

    /**
     * @var string|null Restrict to tasks that are due before the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.243+0200`.
     */
    public ?string $dueBefore;

    /**
     * @var string|null Restrict to tasks that are due before the date described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $dueBeforeExpression;

    /**
     * @var bool|null Only include tasks which have no due date. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withoutDueDate = false;

    /**
     * @var string|null Restrict to tasks that have a followUp date on the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date
     * must have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.342+0200`.
     */
    public ?string $followUpDate;

    /**
     * @var string|null Restrict to tasks that have a followUp date on the date described by the given
     * expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $followUpDateExpression;

    /**
     * @var string|null Restrict to tasks that have a followUp date after the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.542+0200`.
     */
    public ?string $followUpAfter;

    /**
     * @var string|null Restrict to tasks that have a followUp date after the date described by the given
     * expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $followUpAfterExpression;

    /**
     * @var string|null Restrict to tasks that have a followUp date before the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.234+0200`.
     */
    public ?string $followUpBefore;

    /**
     * @var string|null Restrict to tasks that have a followUp date before the date described by the given
     * expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $followUpBeforeExpression;

    /**
     * @var string|null Restrict to tasks that have no followUp date or a followUp date before the given date.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.432+0200`. The typical use case
     * is to query all `active` tasks for a user for a given date.
     */
    public ?string $followUpBeforeOrNotExistent;

    /**
     * @var string|null Restrict to tasks that have no followUp date or a followUp date before the date
     * described by the given expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $followUpBeforeOrNotExistentExpression;

    /**
     * @var string|null Restrict to tasks that were created on the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must have
     * the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.324+0200`.
     */
    public ?string $createdOn;

    /**
     * @var string|null Restrict to tasks that were created on the date described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $createdOnExpression;

    /**
     * @var string|null Restrict to tasks that were created after the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must
     * have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.342+0200`.
     */
    public ?string $createdAfter;

    /**
     * @var string|null Restrict to tasks that were created after the date described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $createdAfterExpression;

    /**
     * @var string|null Restrict to tasks that were created before the given date. By
     * [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must
     * have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.332+0200`.
     */
    public ?string $createdBefore;

    /**
     * @var string|null Restrict to tasks that were created before the date described by the given expression.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $createdBeforeExpression;

    /**
     * @var string|null Restrict to tasks that were updated after the given date. Every action that fires
     * a [task update event](https://docs.camunda.org/manual/develop/user-guide/process-engine/delegation-code/#task-listener-event-lifecycle) is considered as updating the task.
     * By [default](https://docs.camunda.org/manual/develop/reference/rest/overview/date-format/), the date must
     * have the format `yyyy-MM-dd'T'HH:mm:ss.SSSZ`, e.g., `2013-01-23T14:42:45.332+0200`.
     */
    public ?string $updatedAfter;

    /**
     * @var string|null Restrict to tasks that were updated after the date described by the given expression. Every action that fires
     * a [task update event](https://docs.camunda.org/manual/develop/user-guide/process-engine/delegation-code/#task-listener-event-lifecycle) is considered as updating the task.
     * See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to a
     * `java.util.Date` or `org.joda.time.DateTime` object.
     */
    public ?string $updatedAfterExpression;

    /**
     * @var string|null Restrict to tasks that are in the given delegation state. Valid values are
     * `PENDING` and `RESOLVED`.
     */
    public ?string $delegationState;

    /**
     * @var array<string>|null Restrict to tasks that are offered to any of the given candidate groups. Takes a
     * comma-separated list of group names, so for example
     * `developers,support,sales`.
     */
    public ?array $candidateGroups;

    /**
     * @var string|null Restrict to tasks that are offered to any of the candidate groups described by the
     * given expression. See the
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/expression-language/#internal-context-functions)
     * for more information on available functions. The expression must evaluate to
     * `java.util.List` of Strings.
     */
    public ?string $candidateGroupsExpression;

    /**
     * @var bool|null Only include tasks which have a candidate group. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withCandidateGroups = false;

    /**
     * @var bool|null Only include tasks which have no candidate group. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withoutCandidateGroups = false;

    /**
     * @var bool|null Only include tasks which have a candidate user. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withCandidateUsers = false;

    /**
     * @var bool|null Only include tasks which have no candidate users. Value may only be `true`,
     * as `false` is the default behavior.
     */
    public ?bool $withoutCandidateUsers = false;

    /**
     * @var bool|null Only include active tasks. Value may only be `true`, as `false`
     * is the default behavior.
     */
    public ?bool $active = false;

    /**
     * @var bool|null Only include suspended tasks. Value may only be `true`, as
     * `false` is the default behavior.
     */
    public ?bool $suspended = false;

    /**
     * @var array<VariableQueryParameterDto>|null A JSON array to only include tasks that have variables with certain values. The
     * array consists of JSON objects with three properties `name`, `operator` and `value`.
     * `name` is the variable name, `operator` is the comparison operator to be used and
     * `value` the variable value. `value` may be of type `String`, `Number` or `Boolean`.
     *
     * Valid `operator` values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?array $taskVariables;

    /**
     * @var array<VariableQueryParameterDto>|null A JSON array to only include tasks that belong to a process instance with variables
     * with certain values. The array consists of JSON objects with three properties
     * `name`, `operator` and `value`. `name` is the variable name, `operator` is the
     * comparison operator to be used and `value` the variable value. `value` may be of
     * type `String`, `Number` or `Boolean`.
     *
     * Valid `operator` values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`;
     * `notLike`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?array $processVariables;

    /**
     * @var array<VariableQueryParameterDto>|null A JSON array to only include tasks that belong to a case instance with variables
     * with certain values. The array consists of JSON objects with three properties
     * `name`, `operator` and `value`. `name` is the variable name, `operator` is the
     * comparison operator to be used and `value` the variable value. `value` may be of
     * type `String`, `Number` or `Boolean`.
     *
     * Valid `operator` values are:
     * `eq` - equal to;
     * `neq` - not equal to;
     * `gt` - greater than;
     * `gteq` - greater than or equal to;
     * `lt` - lower than;
     * `lteq` - lower than or equal to;
     * `like`.
     * `key` and `value` may not contain underscore or comma characters.
     */
    public ?array $caseInstanceVariables;

    /**
     * @var bool|null Match all variable names in this query case-insensitively. If set
     * `variableName` and `variablename` are treated as equal.
     */
    public ?bool $variableNamesIgnoreCase = false;

    /**
     * @var bool|null Match all variable values in this query case-insensitively. If set
     * `variableValue` and `variablevalue` are treated as equal.
     */
    public ?bool $variableValuesIgnoreCase = false;

    /**
     * @var string|null Restrict query to all tasks that are sub tasks of the given task. Takes a task id.
     */
    public ?string $parentTaskId;

    /**
     * @var array<TaskQueryDto>|null A JSON array of nested task queries with OR semantics. A task matches a nested query if it fulfills
     *at least one* of the query's predicates. With multiple nested queries, a task must fulfill at least one predicate of *each* query ([Conjunctive Normal Form](https://en.wikipedia.org/wiki/Conjunctive_normal_form)).
     *
     * All task query properties can be used except for: `sorting`, `withCandidateGroups`,
     * `withoutCandidateGroups`, `withCandidateUsers`, `withoutCandidateUsers`
     *
     * See the [User guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/process-engine-api/#or-queries)
     * for more information about OR queries.
     */
    public ?array $orQueries;

    /**
     * @var array<object>|null Apply sorting of the result
     */
    public ?array $sorting;


    public function jsonSerialize(): array
    {
        return $this->properties();
    }

    public function properties(): array
    {
        return [
            'taskId' => $this->taskId ?? null,
            'taskIdIn' => $this->taskIdIn ?? null,
            'processInstanceId' => $this->processInstanceId ?? null,
            'processInstanceIdIn' => $this->processInstanceIdIn ?? null,
            'processInstanceBusinessKey' => $this->processInstanceBusinessKey ?? null,
            'processInstanceBusinessKeyExpression' => $this->processInstanceBusinessKeyExpression ?? null,
            'processInstanceBusinessKeyIn' => $this->processInstanceBusinessKeyIn ?? null,
            'processInstanceBusinessKeyLike' => $this->processInstanceBusinessKeyLike ?? null,
            'processInstanceBusinessKeyLikeExpression' => $this->processInstanceBusinessKeyLikeExpression ?? null,
            'processDefinitionId' => $this->processDefinitionId ?? null,
            'processDefinitionKey' => $this->processDefinitionKey ?? null,
            'processDefinitionKeyIn' => $this->processDefinitionKeyIn ?? null,
            'processDefinitionName' => $this->processDefinitionName ?? null,
            'processDefinitionNameLike' => $this->processDefinitionNameLike ?? null,
            'executionId' => $this->executionId ?? null,
            'caseInstanceId' => $this->caseInstanceId ?? null,
            'caseInstanceBusinessKey' => $this->caseInstanceBusinessKey ?? null,
            'caseInstanceBusinessKeyLike' => $this->caseInstanceBusinessKeyLike ?? null,
            'caseDefinitionId' => $this->caseDefinitionId ?? null,
            'caseDefinitionKey' => $this->caseDefinitionKey ?? null,
            'caseDefinitionName' => $this->caseDefinitionName ?? null,
            'caseDefinitionNameLike' => $this->caseDefinitionNameLike ?? null,
            'caseExecutionId' => $this->caseExecutionId ?? null,
            'activityInstanceIdIn' => $this->activityInstanceIdIn ?? null,
            'tenantIdIn' => $this->tenantIdIn ?? null,
            'withoutTenantId' => $this->withoutTenantId ?? null,
            'assignee' => $this->assignee ?? null,
            'assigneeExpression' => $this->assigneeExpression ?? null,
            'assigneeLike' => $this->assigneeLike ?? null,
            'assigneeLikeExpression' => $this->assigneeLikeExpression ?? null,
            'assigneeIn' => $this->assigneeIn ?? null,
            'assigneeNotIn' => $this->assigneeNotIn ?? null,
            'owner' => $this->owner ?? null,
            'ownerExpression' => $this->ownerExpression ?? null,
            'candidateGroup' => $this->candidateGroup ?? null,
            'candidateGroupExpression' => $this->candidateGroupExpression ?? null,
            'candidateUser' => $this->candidateUser ?? null,
            'candidateUserExpression' => $this->candidateUserExpression ?? null,
            'includeAssignedTasks' => $this->includeAssignedTasks ?? null,
            'involvedUser' => $this->involvedUser ?? null,
            'involvedUserExpression' => $this->involvedUserExpression ?? null,
            'assigned' => $this->assigned ?? null,
            'unassigned' => $this->unassigned ?? null,
            'taskDefinitionKey' => $this->taskDefinitionKey ?? null,
            'taskDefinitionKeyIn' => $this->taskDefinitionKeyIn ?? null,
            'taskDefinitionKeyLike' => $this->taskDefinitionKeyLike ?? null,
            'name' => $this->name ?? null,
            'nameNotEqual' => $this->nameNotEqual ?? null,
            'nameLike' => $this->nameLike ?? null,
            'nameNotLike' => $this->nameNotLike ?? null,
            'description' => $this->description ?? null,
            'descriptionLike' => $this->descriptionLike ?? null,
            'priority' => $this->priority ?? null,
            'maxPriority' => $this->maxPriority ?? null,
            'minPriority' => $this->minPriority ?? null,
            'dueDate' => $this->dueDate ?? null,
            'dueDateExpression' => $this->dueDateExpression ?? null,
            'dueAfter' => $this->dueAfter ?? null,
            'dueAfterExpression' => $this->dueAfterExpression ?? null,
            'dueBefore' => $this->dueBefore ?? null,
            'dueBeforeExpression' => $this->dueBeforeExpression ?? null,
            'withoutDueDate' => $this->withoutDueDate ?? null,
            'followUpDate' => $this->followUpDate ?? null,
            'followUpDateExpression' => $this->followUpDateExpression ?? null,
            'followUpAfter' => $this->followUpAfter ?? null,
            'followUpAfterExpression' => $this->followUpAfterExpression ?? null,
            'followUpBefore' => $this->followUpBefore ?? null,
            'followUpBeforeExpression' => $this->followUpBeforeExpression ?? null,
            'followUpBeforeOrNotExistent' => $this->followUpBeforeOrNotExistent ?? null,
            'followUpBeforeOrNotExistentExpression' => $this->followUpBeforeOrNotExistentExpression ?? null,
            'createdOn' => $this->createdOn ?? null,
            'createdOnExpression' => $this->createdOnExpression ?? null,
            'createdAfter' => $this->createdAfter ?? null,
            'createdAfterExpression' => $this->createdAfterExpression ?? null,
            'createdBefore' => $this->createdBefore ?? null,
            'createdBeforeExpression' => $this->createdBeforeExpression ?? null,
            'updatedAfter' => $this->updatedAfter ?? null,
            'updatedAfterExpression' => $this->updatedAfterExpression ?? null,
            'delegationState' => $this->delegationState ?? null,
            'candidateGroups' => $this->candidateGroups ?? null,
            'candidateGroupsExpression' => $this->candidateGroupsExpression ?? null,
            'withCandidateGroups' => $this->withCandidateGroups ?? null,
            'withoutCandidateGroups' => $this->withoutCandidateGroups ?? null,
            'withCandidateUsers' => $this->withCandidateUsers ?? null,
            'withoutCandidateUsers' => $this->withoutCandidateUsers ?? null,
            'active' => $this->active ?? null,
            'suspended' => $this->suspended ?? null,
            'taskVariables' => $this->taskVariables ?? null,
            'processVariables' => $this->processVariables ?? null,
            'caseInstanceVariables' => $this->caseInstanceVariables ?? null,
            'variableNamesIgnoreCase' => $this->variableNamesIgnoreCase ?? null,
            'variableValuesIgnoreCase' => $this->variableValuesIgnoreCase ?? null,
            'parentTaskId' => $this->parentTaskId ?? null,
            'orQueries' => $this->orQueries ?? null,
            'sorting' => $this->sorting ?? null,
        ];
    }

}
