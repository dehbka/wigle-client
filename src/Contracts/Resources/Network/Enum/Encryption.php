<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network\Enum;

enum Encryption: string
{
    case none = 'None';
    case wep = 'WEP';
    case wpa = 'WPA';
    case wpa2 = 'WPA2';
    case wpa3 = 'WPA3';
    case unknown = 'Unknown';
}
