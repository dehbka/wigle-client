<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network\Search;

use Alexanderpas\Common\HTTP\Method;
use Dehbka\WigleClient\Contracts\RequestContract;
use Dehbka\WigleClient\Contracts\Resources\Network\Enum\Encryption;
use Dehbka\WigleClient\Contracts\Resources\Network\ValueObject\QualityOfSignal;
use Dehbka\WigleClient\Contracts\Resources\Network\ValueObject\Variance;

final class SearchRequest implements RequestContract
{
    public function __construct(
        public readonly ?bool $onlyMine = null,
        public readonly ?bool $notMine = null,
        public readonly ?float $latRange1 = null,
        public readonly ?float $latRange2 = null,
        public readonly ?float $longRange1 = null,
        public readonly ?float $longRange2 = null,
        public readonly ?float $closestLat = null,
        public readonly ?float $closestLong = null,
        public readonly ?string $lastUpdated = null,
        public readonly ?string $firstTime = null,
        public readonly ?string $lastTime = null,
        public readonly ?string $startTransId = null,
        public readonly ?string $endTransId = null,
        public readonly ?Encryption $encryption = null,
        public readonly ?bool $freeNet = null,
        public readonly ?bool $payNet = null,
        public readonly ?string $netId = null, //BSSID
        public readonly ?string $ssid = null,
        public readonly ?string $ssidLike = null,
        public readonly ?QualityOfSignal $qualityOfSignal = null,
        public readonly ?Variance $variance = null,
        public readonly ?string $houseNumber = null,
        public readonly ?string $road = null,
        public readonly ?string $city = null,
        public readonly ?string $region = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $country = null,
        public readonly ?string $searchAfter = null,
        public readonly int $resultsPerPage = 25,
    ) {
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function payload(): array
    {
        return [
            'onlymine' => $this->onlyMine,
            'notmine' => $this->notMine,
            'latrange1' => $this->latRange1,
            'latrange2' => $this->latRange2,
            'longrange1' => $this->longRange1,
            'longrange2' => $this->longRange2,
            'closestLat' => $this->closestLat,
            'closestLong' => $this->closestLong,
            'lastupdt' => $this->lastUpdated,
            'firsttime' => $this->firstTime,
            'lasttime' => $this->lastTime,
            'startTransID' => $this->startTransId,
            'endTransID' => $this->endTransId,
            'encryption' => $this->encryption,
            'freenet' => $this->freeNet,
            'paynet' => $this->payNet,
            'netid' => $this->netId,
            'ssid' => $this->ssid,
            'ssidlike' => $this->ssidLike,
            'minQoS' => $this->qualityOfSignal?->getValue(),
            'variance' => $this->variance?->getValue(),
            'houseNumber' => $this->houseNumber,
            'road' => $this->road,
            'city' => $this->city,
            'region' => $this->region,
            'postalCode' => $this->postalCode,
            'resultsPerPage' => $this->resultsPerPage,
            'searchAfter' => $this->searchAfter,
        ];
    }

    public function uri(): string
    {
        return 'network/search';
    }
}
