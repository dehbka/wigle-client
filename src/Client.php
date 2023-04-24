<?php

declare(strict_types=1);

namespace Dehbka\WigleClient;

use Dehbka\WigleClient\Contracts\ClientContract;
use Dehbka\WigleClient\Contracts\Resources\Network\NetworkContract;
use Dehbka\WigleClient\Contracts\Resources\Profile\ProfileContract;
use Dehbka\WigleClient\Resources\Network;
use Dehbka\WigleClient\Resources\Profile;
use JsonMapper\Handler\FactoryRegistry;
use JsonMapper\Handler\PropertyMapper;
use JsonMapper\JsonMapperBuilder;
use JsonMapper\JsonMapperInterface;

final class Client implements ClientContract
{
    public function __construct(
        private readonly HttpTransport $transport,
        private ?JsonMapperInterface $mapper = null,
    ) {
        $factoryRegistry = new FactoryRegistry();
        $this->mapper ??= JsonMapperBuilder::new()
            ->withObjectConstructorMiddleware($factoryRegistry)
            ->withDocBlockAnnotationsMiddleware()
            ->withPropertyMapper(new PropertyMapper($factoryRegistry))
            ->build();

    }

    public function network(): NetworkContract
    {
        return new Network($this->transport, $this->mapper);
    }

    public function profile(): ProfileContract
    {
        return new Profile($this->transport, $this->mapper);
    }
}
