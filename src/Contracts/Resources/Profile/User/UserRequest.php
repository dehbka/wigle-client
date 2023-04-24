<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Profile\User;

use Alexanderpas\Common\HTTP\Method;
use Dehbka\WigleClient\Contracts\RequestContract;

final class UserRequest implements RequestContract
{
    public function method(): Method
    {
        return Method::GET;
    }

    public function uri(): string
    {
        return 'profile/user';
    }

    public function payload(): array
    {
        return [];
    }
}
