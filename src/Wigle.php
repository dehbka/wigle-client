<?php

declare(strict_types=1);

namespace Dehbka\WigleClient;

final class Wigle
{
    public static function client(string $apiKey): Client
    {
        return (new Factory($apiKey))->make();
    }
}
