<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Profile;

use Dehbka\WigleClient\Contracts\Resources\Profile\User\UserRequest;
use Dehbka\WigleClient\Contracts\Resources\Profile\User\UserResponse;

interface ProfileContract
{
    public function user(): UserResponse;
}
