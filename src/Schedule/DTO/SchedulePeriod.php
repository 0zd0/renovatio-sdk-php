<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

use DateTimeImmutable;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final readonly class SchedulePeriod
{
    public function __construct(
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ])]
        public DateTimeImmutable     $date,
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y H:i',
        ])]
        public DateTimeImmutable $timeStart,
        #[Context([
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y H:i',
        ])]
        public DateTimeImmutable $timeEnd,
        public int          $type,
        public int          $clinicId,
        public int          $userId,
        public ?int         $categoryId = null,
        public ?string      $room = null,
        public bool         $withoutCrossing,
        public bool         $disableInSalary,
        public ?int         $cancellationReasonId = null,
    ) {}
}
