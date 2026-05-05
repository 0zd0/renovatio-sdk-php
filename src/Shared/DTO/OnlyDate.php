<?php

namespace Onepix\RenovatioSdk\Shared\DTO;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;

final readonly class OnlyDate
{
    public DateTimeImmutable $value;

    public function __construct(string $value)
    {
        $timezone = new DateTimeZone('UTC');

        $date = DateTimeImmutable::createFromFormat('!d.m.Y', $value, $timezone)
            ?: DateTimeImmutable::createFromFormat('!Y-m-d', $value, $timezone);

        if (!$date) {
            throw new InvalidArgumentException("Invalid date format: {$value}");
        }

        $this->value = $date;
    }
}
