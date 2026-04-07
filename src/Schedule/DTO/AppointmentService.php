<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\DTO;

readonly class AppointmentService
{
    public function __construct(
        public ?string $serviceId = null,
        public ?string $code = null,
        public ?int $count = null,
        public int|float|null $discount = null,
    ) {}

}
