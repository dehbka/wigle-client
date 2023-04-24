<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network;

use Dehbka\WigleClient\Contracts\Resources\Network\Search\SearchRequest;
use Dehbka\WigleClient\Contracts\Resources\Network\Search\SearchResponse;

interface NetworkContract
{
    public function search(SearchRequest $request): SearchResponse;
}
