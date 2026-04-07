<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

readonly class ScheduleSlot
{
    public function __construct(
        public string $scheduleId,
        public string $userId,
        public ?string $user = null,
        public array|string|null $profession = null,
        public ?string $clinicId = null,
        public ?string $clinicColor = null,
        public ?string $date = null,
        public ?string $timeStart = null,
        public ?string $timeStartShort = null,
        public ?string $timeEnd = null,
        public ?string $timeEndShort = null,
        public ?string $time = null,
        public ?string $categoryId = null,
        public ?string $category = null,
        public ?string $color = null,
        public ?string $customColor = null,
        public ?string $room = null,
        public ?bool $isBusy = null,
        public ?bool $isPast = null,
        public ?string $equipmentId = null,
    ) {}
}
