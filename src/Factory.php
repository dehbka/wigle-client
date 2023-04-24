<?php

declare(strict_types=1);

namespace Dehbka\WigleClient;

use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class Factory
{
    public function __construct(
        private string $apiKey,
        private string $baseUri = 'https://api.wigle.net/api/v2/',
        private ?ClientInterface $httpClient = null,
        private ?RequestFactoryInterface $requestFactory = null,
        private ?StreamFactoryInterface $streamFactory = null,
    ) {
        $this->httpClient ??= new \GuzzleHttp\Client();
        $this->requestFactory ??= Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory ??= Psr17FactoryDiscovery::findStreamFactory();
    }

    public function make(): Client
    {
        return new Client(
            new HttpTransport(
                $this->httpClient,
                $this->requestFactory,
                $this->streamFactory,
                $this->apiKey,
                $this->baseUri
            )
        );
    }
}
