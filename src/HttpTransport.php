<?php

declare(strict_types=1);

namespace Dehbka\WigleClient;

use Dehbka\WigleClient\Contracts\RequestContract;
use GuzzleHttp\Psr7\Uri;
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
        $uri = (new Uri($this->baseUri . $request->uri()))
            ->withQuery(http_build_query($request->payload()));

        $psrRequest = $this->requestFactory->createRequest($request->method()->value, $uri);

        $psrRequest = $psrRequest->withHeader('Accept', 'application/json');
        $psrRequest = $psrRequest->withHeader('Authorization', \sprintf('Basic %s', $this->apiKey));

        $response = $this->client->sendRequest($psrRequest);

        //todo handle errors

        return json_decode((string)$response->getBody(), false);
    }
}
