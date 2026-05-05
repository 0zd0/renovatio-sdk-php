<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\DTO;

use Onepix\RenovatioSdk\Shared\DTO\OnlyDate;
use Onepix\RenovatioSdk\Shared\Enums\Gender;

final readonly class User
{
    /**
     * @param int $id
     * @param string $name
     * @param bool $isDeleted
     * @param ?string $avatar
     * @param ?string $avatarSmall
     * @param ?OnlyDate $birthDate
     * @param Gender $gender
     * @param int[] $role
     * @param string $roleTitles
     * @param string $documentNumber
     * @param string|null $documentDate
     * @param string $insurance
     * @param string|null $phone
     * @param string|null $email
     * @param Contact[]|null $contacts
     * @param int[] $profession
     * @param string|null $professionTitles
     * @param int[] $secondProfession
     * @param string|null $secondProfessionTitles
     * @param int[] $clinic
     * @param string|null $clinicTitles
     * @param bool|null $hasCompany
     * @param int|null $avgTime
     * @param int|null $avgTimeCompany
     * @param int|null $avgTimeRepeat
     * @param int|null $avgTimeRepeatCompany
     * @param int|null $defaultClinic
     * @param string $defaultRoom
     * @param bool $isChildDoctor
     * @param bool $isAdultDoctor
     * @param int|null $patientAgeFrom
     * @param int|null $patientAgeTo
     * @param bool $isOutside
     * @param bool $isTelemedicine
     * @param ?OnlyDate $dateWorkFrom
     * @param string|null $workPeriod
     * @param string|null $workDegree
     * @param string|null $workRank
     * @param string|null $workAcademyStatus
     * @param string $doctorInfo
     * @param string $externalLink
     * @param string $education
     * @param string $educationCourses
     * @param int[] $services
     * @param string|null $qualification
     * @param int|null $orderNumber
     */
    public function __construct(
        public int       $id,
        public string    $name,
        public bool      $isDeleted,
        public Gender    $gender,
        public array     $role,
        public string    $roleTitles,
        public string    $documentNumber,
        public string    $insurance,
        public array     $profession,
        public array     $secondProfession,
        public array     $clinic,
        public string    $defaultRoom,
        public bool      $isChildDoctor,
        public bool $isAdultDoctor,
        public array $services,
        public bool $isOutside,
        public bool $isTelemedicine,
        public string $doctorInfo,
        public string $externalLink,
        public string $education,
        public string $educationCourses,
        public ?string   $avatar = null,
        public ?string   $avatarSmall = null,
        public ?OnlyDate $birthDate = null,
        public ?string $documentDate = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?array $contacts = null,
        public ?string $professionTitles = null,
        public ?string $secondProfessionTitles = null,
        public ?string $clinicTitles = null,
        public ?bool $hasCompany = null,
        public ?int $avgTime = null,
        public ?int $avgTimeCompany = null,
        public ?int $avgTimeRepeat = null,
        public ?int $avgTimeRepeatCompany = null,
        public ?int $defaultClinic = null,
        public ?int $patientAgeFrom = null,
        public ?int $patientAgeTo = null,
        public ?OnlyDate $dateWorkFrom = null,
        public ?string $workPeriod = null,
        public ?string $workDegree = null,
        public ?string $workRank = null,
        public ?string $workAcademyStatus = null,
        public ?string $qualification = null,
        public ?int $orderNumber = null,
    ) {}
}
