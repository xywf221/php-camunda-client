<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class TaskComment extends BaseClient
{
    /**
     * Get List
     *
     * Gets the comments for a task by id.
     *
     * @param string $id
     * @return array<CommentDto>
     * @throws GuzzleException
     */
    public function getComments(string $id): array
    {
        $response = $this->client->get("/engine-rest/task/$id/comment", [
        ]);
        return $this->deserializeResponse($response, CommentDto::class . '[]');
    }

    /**
     * Create
     *
     * Creates a comment for a task by id.
     *
     * @param string $id
     * @param CommentDto $bodyDto
     * @return CommentDto
     * @throws GuzzleException
     */
    public function createComment(string $id, CommentDto $bodyDto): CommentDto
    {
        $response = $this->client->post("/engine-rest/task/$id/comment/create", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CommentDto::class);
    }

    /**
     * Get
     *
     * Retrieves a task comment by task id and comment id.
     *
     * @param string $id
     * @param string $commentId
     * @return CommentDto
     * @throws GuzzleException
     */
    public function getComment(string $id, string $commentId): CommentDto
    {
        $response = $this->client->get("/engine-rest/task/$id/comment/$commentId", [
        ]);
        return $this->deserializeResponse($response, CommentDto::class);
    }
}