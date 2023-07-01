<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class TaskAttachment extends BaseClient
{
    /**
     * Get List
     *
     * Gets the attachments for a task.
     *
     * @param string $id
     * @return array<AttachmentDto>
     * @throws GuzzleException
     */
    public function getAttachments(string $id): array
    {
        $response = $this->client->get("/engine-rest/task/$id/attachment", [
        ]);
        return $this->deserializeResponse($response, AttachmentDto::class . '[]');
    }

    /**
     * Create
     *
     * Creates an attachment for a task.
     *
     * @param string $id
     * @param MultiFormAttachmentDto $bodyDto
     * @return AttachmentDto
     * @throws GuzzleException
     */
    public function addAttachment(string $id, MultiFormAttachmentDto $bodyDto): AttachmentDto
    {
        $response = $this->client->post("/engine-rest/task/$id/attachment/create", [
            'multipart' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, AttachmentDto::class);
    }

    /**
     * Delete
     *
     * Removes an attachment from a task by id.
     *
     * @param string $id
     * @param string $attachmentId
     * @throws GuzzleException
     */
    public function deleteAttachment(string $id, string $attachmentId): void
    {
        $this->client->delete("/engine-rest/task/$id/attachment/$attachmentId", [
        ]);
    }

    /**
     * Get
     *
     * Retrieves a task attachment by task id and attachment id.
     *
     * @param string $id
     * @param string $attachmentId
     * @return AttachmentDto
     * @throws GuzzleException
     */
    public function getAttachment(string $id, string $attachmentId): AttachmentDto
    {
        $response = $this->client->get("/engine-rest/task/$id/attachment/$attachmentId", [
        ]);
        return $this->deserializeResponse($response, AttachmentDto::class);
    }

    /**
     * Get (Binary)
     *
     * Retrieves the binary content of a task attachment by task id and attachment id.
     *
     * @param string $id
     * @param string $attachmentId
     * @return string
     * @throws GuzzleException
     */
    public function getAttachmentData(string $id, string $attachmentId): string
    {
        $response = $this->client->get("/engine-rest/task/$id/attachment/$attachmentId/data", [
        ]);
        return $response->getBody()->getContents();
    }
}