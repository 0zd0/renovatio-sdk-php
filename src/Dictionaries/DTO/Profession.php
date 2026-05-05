<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

final readonly class Profession
{
    public function __construct(
        public int $id,
        public string $name,
        public bool $isDeleted,
        public ?string $doctorName = null,
        public ?string $egiszCode = null,
        public ?int $egiszPosition = null,
    ) {}
}
