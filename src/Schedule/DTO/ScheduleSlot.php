<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

use DateTimeImmutable;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final readonly class ScheduleSlot
{
    public function __construct(
        public int $scheduleId,
        public int $userId,
        public string $user,
        public int $clinicId,
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ])]
        public DateTimeImmutable $date,
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s',
        ])]
        public DateTimeImmutable $timeStart,
        public string $timeStartShort,
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s',
        ])]
        public DateTimeImmutable $timeEnd,
        public string $timeEndShort,
        public string $time,
        public int $categoryId,
        public string $category,
        public string $customColor,
        public bool $isBusy,
        public bool $isPast,
        public ?string $room = null,
        public ?string $clinicColor = null,
        public ?int $color = null,
        public ?string $profession = null,
        public ?int $equipmentId = null,
    ) {}
}
