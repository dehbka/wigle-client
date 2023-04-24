<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network\Dto;

final class NetworkDto
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $ssid,
        public readonly int $qualityOfSignal,
        public readonly string $transId,
        public readonly string $firstTime,
        public readonly string $lastTime,
        public readonly string $lastUpdated,
        public readonly string $netId,
        public readonly string $type,
        public readonly string $wep,
        public readonly int $bcnInterval,
        public readonly string $freeNet,
        public readonly string $payNet,
        public readonly string $dhcp,
        public readonly bool $userFound,
        public readonly int $channel,
        public readonly string $encryption,
        public readonly string $country,
        public readonly string $region,
        public readonly string $city,
        public readonly string $houseNumber,
        public readonly string $postalCode,
        public readonly ?string $comment = null,
        public readonly ?string $name = null,
    ) {
    }
}
