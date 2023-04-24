<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network\Search;

use Dehbka\WigleClient\Contracts\Resources\Network\Dto\NetworkDto;

final class SearchResponse
{
    /**
     * @param NetworkDto[] $results
     */
    public function __construct(
        public readonly bool $success,
        public readonly int $totalResults,
        public readonly int $first,
        public readonly int $last,
        public readonly int $resultCount,
        public readonly array $results,
        public readonly string $searchAfter,
    ) {
    }
}
