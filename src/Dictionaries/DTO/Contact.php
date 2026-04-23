<?php

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

final readonly class Contact
{
    public function __construct(
        public string $type,
        public string $typeTitle,
        public string $value,
        public ?string $comment = null,
        public bool $isMain,
    ) {}
}
