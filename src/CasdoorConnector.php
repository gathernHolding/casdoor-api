<?php

namespace Gathern\CasdoorAPI;

use Gathern\CasdoorAPI\Resource\LoginApi;
use Gathern\CasdoorAPI\Resource\SyncerApi;
use Gathern\CasdoorAPI\Resource\TokenApi;
use Gathern\CasdoorAPI\Resource\UserApi;
use Gathern\CasdoorAPI\Resource\VerificationApi;
use Gathern\CasdoorAPI\Resource\WebhookApi;
use Saloon\Http\Connector;

/**
 * Casdoor RESTful API
 *
 * Swagger Docs of Casdoor Backend API
 */
class CasdoorConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return getenv('CASDOOR_BASE_URL') ?: 'http://127.0.0.1:8000';
    }

    public function loginApi(): LoginApi
    {
        return new LoginApi($this);
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
}
