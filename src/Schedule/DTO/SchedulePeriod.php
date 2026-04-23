<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

use Onepix\RenovatioSdk\Shared\DTO\OnlyDate;
use Onepix\RenovatioSdk\Shared\DTO\OnlyDateTime;

readonly class SchedulePeriod
{
    public function __construct(
        public OnlyDate     $date,
        public OnlyDateTime $timeStart,
        public OnlyDateTime $timeEnd,
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
