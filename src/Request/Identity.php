<?php

namespace Camunda\Request;

use Camunda\BaseClient;
use GuzzleHttp\Exception\GuzzleException;

class Identity extends BaseClient
{
    /**
     * Get a User&#039;s Groups
     *
     * Gets the groups of a user by id and includes all users that share a group with the
     * given user.
     *
     * @param GetGroupInfoDto $queryDto
     * @return IdentityServiceGroupInfoDto
     * @throws GuzzleException
     */
    public function getGroupInfo(GetGroupInfoDto $queryDto): IdentityServiceGroupInfoDto
    {
        $response = $this->client->get("/engine-rest/identity/groups", [
            'query' => $queryDto?->properties(),
        ]);
        return $this->deserializeResponse($response, IdentityServiceGroupInfoDto::class);
    }

    /**
     * Get Password Policy
     *
     * A password policy consists of a list of rules that new passwords must follow to be
     * policy compliant. This end point returns a JSON representation of the
     * list of policy rules. More information on password policies in Camunda can be found in the password policy
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/password-policy/) and in
     * the [security instructions](https://docs.camunda.org/manual/develop/user-guide/security/).
     *
     * @return PasswordPolicyDto
     * @throws GuzzleException
     */
    public function getPasswordPolicy(): PasswordPolicyDto
    {
        $response = $this->client->get("/engine-rest/identity/password-policy", [
        ]);
        return $this->deserializeResponse($response, PasswordPolicyDto::class);
    }

    /**
     * Validate Password
     *
     * A password policy consists of a list of rules that new passwords must follow to be
     * policy compliant. A password can be checked for compliancy via this
     * end point. More information on password policies in Camunda can be found in the password policy
     * [user guide](https://docs.camunda.org/manual/develop/user-guide/process-engine/password-policy/) and in
     * the [security instructions](https://docs.camunda.org/manual/develop/user-guide/security/).
     *
     * @param PasswordPolicyRequestDto $bodyDto
     * @return CheckPasswordPolicyResultDto
     * @throws GuzzleException
     */
    public function checkPassword(PasswordPolicyRequestDto $bodyDto): CheckPasswordPolicyResultDto
    {
        $response = $this->client->post("/engine-rest/identity/password-policy", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, CheckPasswordPolicyResultDto::class);
    }

    /**
     * Verify User
     *
     * Verifies that user credentials are valid.
     *
     * @param BasicUserCredentialsDto $bodyDto
     * @return AuthenticationResult
     * @throws GuzzleException
     */
    public function verifyUser(BasicUserCredentialsDto $bodyDto): AuthenticationResult
    {
        $response = $this->client->post("/engine-rest/identity/verify", [
            'json' => $bodyDto->properties(),
        ]);
        return $this->deserializeResponse($response, AuthenticationResult::class);
    }
}