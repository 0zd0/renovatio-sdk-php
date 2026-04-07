<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

readonly class SchedulePeriod
{
    public function __construct(
        public string $date,
        public string $timeStart,
        public string $timeEnd,
        public ?int $type = null,
        public ?string $clinicId = null,
        public ?string $userId = null,
        public ?string $categoryId = null,
        public ?string $room = null,
        public ?bool $withoutCrossing = null,
        public ?bool $disableInSalary = null,
        public ?string $cancellationReasonId = null,
    ) {}
}
