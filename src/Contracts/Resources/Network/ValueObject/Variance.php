<?php

declare(strict_types=1);

namespace Dehbka\WigleClient\Contracts\Resources\Network\ValueObject;

final class Variance
{
    private const MIN = 0.001;
    private const MAX = 0.2;

    private readonly float $value;

    public function __construct(
        int $value
    ) {
        if (self::MIN <= $value && $value <= self::MAX) {
            throw new \InvalidArgumentException(
                \sprintf('Value must be between %s and %s', self::MIN, self::MAX)
            );
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
