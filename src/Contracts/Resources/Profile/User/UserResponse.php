<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Profile\User;

final class UserResponse
{
    public function __construct(
        public readonly string $userId,
        public readonly string $email,
        public readonly string $donate,
        public readonly string $joinDate,
        public readonly string $lastLogin,
        public readonly int $flags,
        public readonly string $success,
    ) {
    }
}
