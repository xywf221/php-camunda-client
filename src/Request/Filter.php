<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Filter extends BaseClient
{
    /**
     * Get Filters
     *
     * Queries for a list of filters using a list of parameters. The size of the result
     * set can be retrieved
     * by using the [Get Filter Count](https://docs.camunda.org/manual/develop/reference/rest/filter/get-query-count/) method.
     *
     * @param GetFilterListDto|null $queryDto
     * @return array<FilterDto>
     * @throws GuzzleException
     */
    public function getFilterList(GetFilterListDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/filter", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, FilterDto::class . '[]');
    }

    /**
     * Filter Resource Options
     *
     * The OPTIONS request allows you to check for the set of available operations
     * that the currently authenticated user can perform on the `/filter` resource.
     * Whether the user can perform an operation or not may depend on various
     * factors, including the users authorizations to interact with this
     * resource and the internal configuration of the process engine.
     *
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function filterResourceOptions(): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/filter", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Get Filter Count
     *
     * Retrieves the number of filters that fulfill a provided query. Corresponds to the
     * size of the result set when using the
     * [Get Filters](https://docs.camunda.org/manual/develop/reference/rest/filter/get-query/) method.
     *
     * @param GetFilterCountDto|null $queryDto
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function getFilterCount(GetFilterCountDto $queryDto = null): CountResultDto
    {
        $response = $this->client->get("/engine-rest/filter/count", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Create Filter
     *
     * Creates a new filter.
     *
     * @param CreateFilterDto $bodyDto
     * @return FilterDto
     * @throws GuzzleException
     */
    public function createFilter(CreateFilterDto $bodyDto): FilterDto
    {
        $response = $this->client->post("/engine-rest/filter/create", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, FilterDto::class);
    }

    /**
     * Delete Filter
     *
     * Deletes a filter by id.
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function deleteFilter(string $id): void
    {
        $this->client->delete("/engine-rest/filter/$id", [
        ]);
    }

    /**
     * Get Single Filter
     *
     * Retrieves a single filter by id, according to the `Filter` interface in the engine.
     *
     * @param string $id
     * @param GetSingleFilterDto|null $queryDto
     * @return FilterDto
     * @throws GuzzleException
     */
    public function getSingleFilter(string $id, GetSingleFilterDto $queryDto = null): FilterDto
    {
        $response = $this->client->get("/engine-rest/filter/$id", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, FilterDto::class);
    }

    /**
     * Filter Resource Options
     *
     * The OPTIONS request allows you to check for the set of available operations
     * that the currently authenticated user can perform on the `/filter` resource.
     * Whether the user can perform an operation or not may depend on various
     * factors, including the users authorizations to interact with this
     * resource and the internal configuration of the process engine.
     *
     * @param string $id
     * @return ResourceOptionsDto
     * @throws GuzzleException
     */
    public function filterResourceOptionsSingle(string $id): ResourceOptionsDto
    {
        $response = $this->client->options("/engine-rest/filter/$id", [
        ]);
        return $this->deserializeResponse($response, ResourceOptionsDto::class);
    }

    /**
     * Update Filter
     *
     * Updates an existing filter.
     *
     * @param string $id
     * @param CreateFilterDto $bodyDto
     * @throws GuzzleException
     */
    public function updateFilter(string $id, CreateFilterDto $bodyDto): void
    {
        $this->client->put("/engine-rest/filter/$id", [
            'json' => $bodyDto->properties(),
        ]);
    }

    /**
     * Execute Filter Count
     *
     * Executes the saved query of the filter by id and returns the count.
     *
     * @param string $id
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function executeFilterCount(string $id): CountResultDto
    {
        $response = $this->client->get("/engine-rest/filter/$id/count", [
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Execute Filter Count (POST)
     *
     * Executes the saved query of the filter by id and returns the count. This method is
     * slightly more powerful then the [Get Execute Filter Count](https://docs.camunda.org/manual/develop/reference/rest/filter/get-execute-count/)
     * method because it allows to extend the saved query of the filter.
     *
     * @param string $id
     * @return CountResultDto
     * @throws GuzzleException
     */
    public function postExecuteFilterCount(string $id): CountResultDto
    {
        $response = $this->client->post("/engine-rest/filter/$id/count", [
        ]);
        return $this->deserializeResponse($response, CountResultDto::class);
    }

    /**
     * Execute Filter List
     *
     * Executes the saved query of the filter by id and returns the result list.
     *
     * @param string $id
     * @param ExecuteFilterListDto|null $queryDto
     * @return array<object>
     * @throws GuzzleException
     */
    public function executeFilterList(string $id, ExecuteFilterListDto $queryDto = null): array
    {
        $response = $this->client->get("/engine-rest/filter/$id/list", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, object::class . '[]');
    }

    /**
     * Execute Filter List (POST)
     *
     * Executes the saved query of the filter by id and returns the result list. This
     * method is slightly more powerful then the
     * [Get Execute FilterList](https://docs.camunda.org/manual/develop/reference/rest/filter/get-execute-list/) method
     * because it allows to extend the saved query of the filter.
     *
     * @param string $id
     * @param PostExecuteFilterListDto|null $queryDto
     * @return array<object>
     * @throws GuzzleException
     */
    public function postExecuteFilterList(string $id, PostExecuteFilterListDto $queryDto = null): array
    {
        $response = $this->client->post("/engine-rest/filter/$id/list", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, object::class . '[]');
    }

    /**
     * Execute Filter Single Result
     *
     * Executes the saved query of the filter by id and returns the single result.
     *
     * @param string $id
     * @return object
     * @throws GuzzleException
     */
    public function executeFilterSingleResult(string $id): object
    {
        $response = $this->client->get("/engine-rest/filter/$id/singleResult", [
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Execute Filter Single Result (POST)
     *
     * Executes the saved query of the filter by id and returns the single result. This method is slightly more
     * powerful then the [Get Execute Filter Single Result](https://docs.camunda.org/manual/develop/reference/rest/filter/get-execute-single-result/)
     * method because it allows to extend the saved query of the filter.
     *
     * @param string $id
     * @return object
     * @throws GuzzleException
     */
    public function postExecuteFilterSingleResult(string $id): object
    {
        $response = $this->client->post("/engine-rest/filter/$id/singleResult", [
        ]);
        return json_decode($response->getBody()->getContents());
    }
}