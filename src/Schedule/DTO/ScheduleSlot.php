<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

use Onepix\RenovatioSdk\Shared\DTO\OnlyDate;

readonly class ScheduleSlot
{
    public function __construct(
        public int $scheduleId,
        public int $userId,
        public string $user,
        public ?string $profession = null,
        public int $clinicId,
        public ?string $clinicColor = null,
        public OnlyDate $date,
        public string $timeStart,
        public string $timeStartShort,
        public string $timeEnd,
        public string $timeEndShort,
        public string $time,
        public int $categoryId,
        public string $category,
        public ?int $color = null,
        public string $customColor,
        public ?string $room = null,
        public bool $isBusy,
        public bool $isPast,
        public ?int $equipmentId = null,
    ) {}
}
