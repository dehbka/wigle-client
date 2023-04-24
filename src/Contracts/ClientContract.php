<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts;

use Dehbka\WigleClient\Contracts\Resources\Network\NetworkContract;
use Dehbka\WigleClient\Contracts\Resources\Profile\ProfileContract;

interface ClientContract
{
    public function network(): NetworkContract;

    public function profile(): ProfileContract;
}
