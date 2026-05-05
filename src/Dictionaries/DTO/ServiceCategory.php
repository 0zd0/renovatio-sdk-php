<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

final readonly class ServiceCategory
{
    /**
     * @param int $id
     * @param string $title
     * @param bool $isDeleted
     * @param int $servicesCount
     * @param ServiceCategory[] $children
     */
    public function __construct(
        public int $id,
        public string $title,
        public bool $isDeleted,
        public array $children,
        public int $servicesCount,
    ) {}
}
