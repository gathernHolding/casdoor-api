<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO;

class OauthTokenResponseData
{
    public function __construct(
        public readonly ?string $accessToken,
        public readonly ?string $idToken,
        public readonly ?string $refreshToken,
        public readonly ?string $tokenType,
        public readonly ?int $expiresIn,
        /** @var string[] */
        public readonly ?array $scope = []
    ) {}
}
