<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

final readonly class Clinic
{
    /**
     * @param list<string>|null $images
     */
    public function __construct(
        public int $id,
        public string $title,
        public bool $isDeleted,
        public ?string $color = null,
        public ?string $doctorName = null,
        public ?string $licenseNumber = null,
        public ?string $licenseDate = null,
        public ?string $phone = null,
        public ?string $mobile = null,
        public ?string $site = null,
        public ?string $email = null,
        public ?string $address = null,
        public ?string $inn = null,
        public ?string $kpp = null,
        public ?string $bin = null,
        public ?string $bank = null,
        public ?string $bic = null,
        public ?string $account = null,
        public ?string $corAccount = null,
        public ?string $directorName = null,
        public ?string $legalAddress = null,
        public ?string $realAddress = null,
        public ?string $city = null,
        public ?array $images = null,
    ) {}
}
