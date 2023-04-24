<?php

declare(strict_types=1);

namespace Dehbka\WigleClient;

use Dehbka\WigleClient\Contracts\RequestContract;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class HttpTransport
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly string $apiKey,
        private readonly string $baseUri,
    ) {
    }

    public function doRequest(RequestContract $request): \stdClass
    {
        $psrRequest = $this->requestFactory->createRequest($request->method()->value, $this->baseUri . $request->uri());

        $psrRequest = $psrRequest->withBody($this->streamFactory->createStream(
            \json_encode($request->payload(), JSON_THROW_ON_ERROR)
        ));

        $psrRequest = $psrRequest->withHeader('Accept', 'application/json');
        $psrRequest = $psrRequest->withHeader('Authorization', \sprintf('Basic %s', $this->apiKey));

        $response = $this->client->sendRequest($psrRequest);

        //todo handle errors

        return json_decode((string)$response->getBody(), false);
    }
}
