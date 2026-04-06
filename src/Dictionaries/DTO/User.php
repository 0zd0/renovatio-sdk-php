<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

readonly class User
{
    public function __construct(
        public string $id,
        public string $name,
        public bool $isDeleted,
        public ?string $avatar = null,
        public ?string $avatarSmall = null,
        public ?string $birthDate = null,
        public ?string $gender = null,
        public ?array $role = null,
        public ?array $roleTitles = null,
        public ?string $documentNumber = null,
        public ?string $documentDate = null,
        public ?string $insurance = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?array $contacts = null,
        public ?array $profession = null,
        public ?array $professionTitles = null,
        public ?array $secondProfession = null,
        public ?array $secondProfessionTitles = null,
        public ?array $clinic = null,
        public ?array $clinicTitles = null,
        public ?bool $hasCompany = null,
        public ?int $avgTime = null,
        public ?int $avgTimeCompany = null,
        public ?int $avgTimeRepeat = null,
        public ?int $avgTimeRepeatCompany = null,
        public ?string $defaultClinic = null,
        public ?string $defaultRoom = null,
        public ?bool $isChildDoctor = null,
        public ?bool $isAdultDoctor = null,
        public ?int $patientAgeFrom = null,
        public ?int $patientAgeTo = null,
        public ?bool $isOutside = null,
        public ?bool $isTelemedicine = null,
        public ?string $dateWorkFrom = null,
        public ?string $workPeriod = null,
        public ?string $workDegree = null,
        public ?string $workRank = null,
        public ?string $workAcademyStatus = null,
        public ?string $doctorInfo = null,
        public ?string $externalLink = null,
        public ?string $education = null,
        public ?string $educationCourses = null,
        public ?array $services = null,
        public ?string $qualification = null,
        public ?int $orderNumber = null,
    ) {}
}
