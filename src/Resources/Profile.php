<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Resources;

use Dehbka\WigleClient\Contracts\Resources\Profile\ProfileContract;
use Dehbka\WigleClient\Contracts\Resources\Profile\User\UserRequest;
use Dehbka\WigleClient\Contracts\Resources\Profile\User\UserResponse;
use Dehbka\WigleClient\HttpTransport;
use JsonMapper\JsonMapperInterface;
use JsonMapper\Middleware\Rename\Rename;

final class Profile implements ProfileContract
{
    public function __construct(
        private readonly HttpTransport $transport,
        private readonly JsonMapperInterface $mapper,
    ) {
    }

    public function user(): UserResponse
    {
        $rename = new Rename();
        $rename->addMapping(UserResponse::class, 'userid', 'userId');
        $rename->addMapping(UserResponse::class, 'joindate', 'joinDate');
        $rename->addMapping(UserResponse::class, 'lastlogin', 'lastLogin');

        $this->mapper->unshift($rename);

        return $this->mapper->mapToClass(
            $this->transport->doRequest(new UserRequest()),
            UserResponse::class
        );
    }
}
