<?php

namespace Gathern\CasdoorAPI;

use Gathern\CasdoorAPI\Resource\AccountApi;
use Gathern\CasdoorAPI\Resource\AdapterApi;
use Gathern\CasdoorAPI\Resource\ApplicationApi;
use Gathern\CasdoorAPI\Resource\CallbackApi;
use Gathern\CasdoorAPI\Resource\CertApi;
use Gathern\CasdoorAPI\Resource\EnforcerApi;
use Gathern\CasdoorAPI\Resource\GroupApi;
use Gathern\CasdoorAPI\Resource\InvitationApi;
use Gathern\CasdoorAPI\Resource\LoginApi;
use Gathern\CasdoorAPI\Resource\MfaApi;
use Gathern\CasdoorAPI\Resource\ModelApi;
use Gathern\CasdoorAPI\Resource\OidcApi;
use Gathern\CasdoorAPI\Resource\OrganizationApi;
use Gathern\CasdoorAPI\Resource\PaymentApi;
use Gathern\CasdoorAPI\Resource\PermissionApi;
use Gathern\CasdoorAPI\Resource\PlanApi;
use Gathern\CasdoorAPI\Resource\PricingApi;
use Gathern\CasdoorAPI\Resource\ProductApi;
use Gathern\CasdoorAPI\Resource\ProviderApi;
use Gathern\CasdoorAPI\Resource\ResourceApi;
use Gathern\CasdoorAPI\Resource\RoleApi;
use Gathern\CasdoorAPI\Resource\ServiceApi;
use Gathern\CasdoorAPI\Resource\SessionApi;
use Gathern\CasdoorAPI\Resource\SubscriptionApi;
use Gathern\CasdoorAPI\Resource\SyncerApi;
use Gathern\CasdoorAPI\Resource\SystemApi;
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
        return getenv("CASDOOR_BASE_URL") ?: "http://127.0.0.1:8000";
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
