<?php

namespace Onepix\RenovatioSdk\Shared\DTO;

use DateTimeImmutable;
use InvalidArgumentException;

final readonly class OnlyDateTime
{
    public DateTimeImmutable $value;

    public function __construct(string $value)
    {
        $date = DateTimeImmutable::createFromFormat('d.m.Y H:i', $value);

        if (!$date) {
            throw new InvalidArgumentException("Invalid date format: {$value}");
        }

        $this->value = $date->setTime(0, 0);
    }
}
