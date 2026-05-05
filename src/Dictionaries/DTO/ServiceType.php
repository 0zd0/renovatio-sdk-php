<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

final readonly class ServiceType
{
    public function __construct(
        public int $id,
        public string $title,
        public bool $isDeleted,
    ) {}
}
