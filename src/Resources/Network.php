<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Resources;

use Dehbka\WigleClient\Contracts\Resources\Network\Dto\NetworkDto;
use Dehbka\WigleClient\Contracts\Resources\Network\NetworkContract;
use Dehbka\WigleClient\Contracts\Resources\Network\Search\SearchRequest;
use Dehbka\WigleClient\Contracts\Resources\Network\Search\SearchResponse;
use Dehbka\WigleClient\HttpTransport;
use JsonMapper\JsonMapperInterface;
use JsonMapper\Middleware\Rename\Rename;

final class Network implements NetworkContract
{
    public function __construct(
        private readonly HttpTransport $transport,
        private readonly JsonMapperInterface $mapper,
    ) {

    }

    public function search(SearchRequest $request): SearchResponse
    {
        $rename = new Rename();
        $rename->addMapping(NetworkDto::class, 'trilat', 'latitude');
        $rename->addMapping(NetworkDto::class, 'trilong', 'longitude');
        $rename->addMapping(NetworkDto::class, 'qos', 'qualityOfSignal');
        $rename->addMapping(NetworkDto::class, 'transid', 'transId');
        $rename->addMapping(NetworkDto::class, 'firsttime', 'firstTime');
        $rename->addMapping(NetworkDto::class, 'lasttime', 'lastTime');
        $rename->addMapping(NetworkDto::class, 'lastupd', 'lastUpdated');
        $rename->addMapping(NetworkDto::class, 'netid', 'netId');
        $rename->addMapping(NetworkDto::class, 'bcninterval', 'bcnInterval');
        $rename->addMapping(NetworkDto::class, 'freenet', 'freeNet');
        $rename->addMapping(NetworkDto::class, 'paynet', 'payNet');
        $rename->addMapping(NetworkDto::class, 'userfound', 'userFound');
        $rename->addMapping(NetworkDto::class, 'housenumber', 'houseNumber');
        $rename->addMapping(NetworkDto::class, 'postalcode', 'postalCode');

        $this->mapper->unshift($rename);

        return $this->mapper->mapToClass(
            $this->transport->doRequest($request),
            SearchResponse::class
        );
    }
}
