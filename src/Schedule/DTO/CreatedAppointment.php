<?php

namespace Onepix\RenovatioSdk\Schedule\DTO;

final readonly class CreatedAppointment
{
    public function __construct(
        public string $id,
    ) {}
}
