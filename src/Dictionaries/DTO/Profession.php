<?php
declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

readonly class Profession
{
    public function __construct(
        public string $id,
        public string $name,
        public bool $isDeleted,
        public ?string $doctorName = null,
        public ?string $egiszCode = null,
        public ?string $egiszPosition = null,
    ) {}
}
