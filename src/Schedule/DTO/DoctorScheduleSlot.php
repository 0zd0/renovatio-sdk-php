<?php

namespace Onepix\RenovatioSdk\Schedule\DTO;

final readonly class DoctorScheduleSlot
{
    /**
     * @param ScheduleSlot[] $slots
     */
    public function __construct(
        public int $id,
        public array $slots,
    ) {}
}
