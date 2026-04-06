<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

readonly class ServiceCategory
{
    public function __construct(
        public string $id,
        public string $title,
        public bool $isDeleted,
        public ?int $servicesCount = null,
        public ?array $children = null,
    ) {}
}
