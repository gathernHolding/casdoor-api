<?php

namespace Gathern\CasdoorAPI;

use Gathern\CasdoorAPI\Resource\GroupApi;
use Gathern\CasdoorAPI\Resource\LoginApi;
use Gathern\CasdoorAPI\Resource\PermissionApi;
use Gathern\CasdoorAPI\Resource\RoleApi;
use Gathern\CasdoorAPI\Resource\SyncerApi;
use Gathern\CasdoorAPI\Resource\TokenApi;
use Gathern\CasdoorAPI\Resource\UserApi;
use Gathern\CasdoorAPI\Resource\VerificationApi;
use Gathern\CasdoorAPI\Resource\WebhookApi;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;

/**
 * Casdoor RESTful API
 *
 * Swagger Docs of Casdoor Backend API
 */
class CasdoorConnector extends Connector
{
    public readonly string $client_id;

    public readonly string $client_secret;

    public function resolveBaseUrl(): string
    {
        return getenv('CASDOOR_BASE_URL') ?: 'http://127.0.0.1:8000';
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator(
            username: $this->client_id,
            password: $this->client_secret,
        );
    }

    public function loginApi(): LoginApi
    {
        return new LoginApi($this);
    }

    public function roleApi(): RoleApi
    {
        return new RoleApi($this);
    }

    public function permissionApi(): PermissionApi
    {
        return new PermissionApi($this);
    }

    public function syncerApi(): SyncerApi
    {
        return new SyncerApi($this);
    }

    public function tokenApi(): TokenApi
    {
        return new TokenApi($this);
    }

    public function userApi(): UserApi
    {
        return new UserApi($this);
    }

    public function verificationApi(): VerificationApi
    {
        return new VerificationApi($this);
    }

    public function webhookApi(): WebhookApi
    {
        return new WebhookApi($this);
    }

    public function groupApi(): GroupApi
    {
        return new GroupApi($this);
    }

    public function __construct(?string $client_id = null, ?string $client_secret = null)
    {
        $this->client_id = (string) ($client_id ?? getenv('AUTH_CLIENT_ID'));
        $this->client_secret = (string) ($client_secret ?? getenv('AUTH_CLIENT_SECRET'));
    }
}
