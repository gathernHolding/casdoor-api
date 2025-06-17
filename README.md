------
This package provides a wonderful **Casdoor-api** integration for PHP projects.

> **Requires [PHP 8.1+](https://php.net/releases/)**

## Installation

You can install the package via composer:

```bash
composer require gathern/casdoor-api
```

## Usage

```php
$connector = new \Gathern\CasdoorAPI\CasdoorConnector();
```

### Available Endpoints

#### User API

```php
// Create a new user
$response = $connector->userApi()->apiControllerAddUser(
    name: 'username'
);

// Update user password
$response = $connector->userApi()->apiControllerSetUserPassword(
    userName: 'username',
    newPassword: 'new_password'
);
```

#### Login API

```php
// Login with username and password
$response = $connector->loginApi()->apiControllerLogin(
    application: 'your-app-name',
    username: 'username',
    signinMethod: \Gathern\CasdoorAPI\Enum\SignInMethod::PASSWORD,
    password: 'password'
);

// Get JWT token using client credentials
$response = $connector->TokenApi()->apiControllerGetOauthToken(
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    grantType: \Gathern\CasdoorAPI\Enum\GrantType::CLIENT_CREDENTIALS
);
```

#### Role API

```php
// Get all roles
$response = $connector->roleApi()->apiControllerGetRoles();

// Get role details
$response = $connector->roleApi()->apiControllerGetRole(id: 'role-name');

// Add a new role
$response = $connector->roleApi()->apiControllerAddRole(
    name: 'new-role',
    displayName: 'New Role'
);

// Update a role
$response = $connector->roleApi()->apiControllerUpdateRole(
    id: 'role-name',
    displayName: 'Updated Role Name'
);

// Update role from role data object
$roleDetails = $connector->roleApi()->apiControllerGetRole(id: 'role-name')->dto();
$response = $connector->roleApi()->apiControllerUpdateRoleFromRoleData(
    $roleDetails->data,
    displayName: 'Updated Role Name'
);
```

#### Group API

```php
// Get all groups
$response = $connector->groupApi()->apiControllerGetGroups('organization-name');

// Get group details
$response = $connector->groupApi()->apiControllerGetGroup(id: 'group-name');

// Add a new group
$response = $connector->groupApi()->apiControllerAddGroup(
    name: 'new-group'
);

// Update a group
$response = $connector->groupApi()->apiControllerUpdateGroup(
    id: 'group-name',
    name: 'updated-group-name'
);
```

## Handling Responses

All API methods return a response object with the following methods:

```php
// Get the response as a DTO
$responseDto = $response->dto();

// Check the status of the response
if ($responseDto->status === \Gathern\CasdoorAPI\Enum\ResponseStatus::OK) {
    // Success
    $data = $responseDto->data;
} else {
    // Error
    $errorMessage = $responseDto->msg;
}
```

🧹 Keep a modern codebase with **Pint**:
```bash
composer lint
```

✅ Run refactors using **Rector**
```bash
composer refacto
```

⚗️ Run static analysis using **PHPStan**:
```bash
composer test:types
```

✅ Run unit tests using **PEST**
```bash
composer test:unit
```

🚀 Run the entire test suite:
```bash
composer test
```
