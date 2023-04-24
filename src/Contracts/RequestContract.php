<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts;

use Alexanderpas\Common\HTTP\Method;

interface RequestContract
{
    public function method(): Method;

    public function uri(): string;

    public function payload(): array;
}
