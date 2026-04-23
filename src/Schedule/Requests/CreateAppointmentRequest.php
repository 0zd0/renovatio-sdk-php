<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\Requests;

use DateTimeInterface;
use Onepix\RenovatioSdk\Schedule\DTO\AppointmentService;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Support\APIMapper;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class CreateAppointmentRequest extends BaseRenovatioRequest implements HasBody
{
    protected Method $method = Method::POST;

    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $thirdName = null;
    private DateTimeInterface|string|null $birthDate = null;
    private ?string $mobile = null;
    private ?int $gender = null;
    private ?string $email = null;
    private ?string $patientId = null;
    private ?string $room = null;
    private ?string $channel = null;
    private ?string $source = null;
    private ?string $type = null;
    private ?string $comment = null;
    private ?bool $isOutside = null;
    private ?string $isOutsideAddress = null;
    private ?bool $isTelemedicine = null;
    private ?bool $noSms = null;
    private ?bool $noEmail = null;
    private ?bool $isHandled = null;
    private ?string $movedFrom = null;
    private ?bool $checkIntersection = null;
    private ?bool $checkAge = null;
    /** @var array<AppointmentService>|null */
    private ?array $services = null;
    private ?string $utmSource = null;
    private ?string $utmMedium = null;
    private ?string $utmCampaign = null;

    public function __construct(
        private string $doctorId,
        private string $clinicId,
        private DateTimeInterface|string $timeStart,
        private DateTimeInterface|string $timeEnd,
    ) {}

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setThirdName(?string $thirdName): static
    {
        $this->thirdName = $thirdName;

        return $this;
    }

    public function setBirthDate(DateTimeInterface|string|null $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function setMobile(?string $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function setGender(?int $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function setPatientId(?string $patientId): static
    {
        $this->patientId = $patientId;

        return $this;
    }

    public function setRoom(?string $room): static
    {
        $this->room = $room;

        return $this;
    }

    public function setChannel(?string $channel): static
    {
        $this->channel = $channel;

        return $this;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function setIsOutside(bool $isOutside = true): static
    {
        $this->isOutside = $isOutside;

        return $this;
    }

    public function setIsOutsideAddress(?string $isOutsideAddress): static
    {
        $this->isOutsideAddress = $isOutsideAddress;

        return $this;
    }

    public function setIsTelemedicine(bool $isTelemedicine = true): static
    {
        $this->isTelemedicine = $isTelemedicine;

        return $this;
    }

    public function setNoSms(bool $noSms = true): static
    {
        $this->noSms = $noSms;

        return $this;
    }

    public function setNoEmail(bool $noEmail = true): static
    {
        $this->noEmail = $noEmail;

        return $this;
    }

    public function setIsHandled(bool $isHandled = true): static
    {
        $this->isHandled = $isHandled;

        return $this;
    }

    public function setMovedFrom(?string $movedFrom): static
    {
        $this->movedFrom = $movedFrom;

        return $this;
    }

    public function setCheckIntersection(bool $checkIntersection = true): static
    {
        $this->checkIntersection = $checkIntersection;

        return $this;
    }

    public function setCheckAge(bool $checkAge = true): static
    {
        $this->checkAge = $checkAge;

        return $this;
    }

    /**
     * @param array<AppointmentService>|null $services
     */
    public function setServices(?array $services): static
    {
        $this->services = $services;

        return $this;
    }

    public function setUtmSource(?string $utmSource): static
    {
        $this->utmSource = $utmSource;

        return $this;
    }

    public function setUtmMedium(?string $utmMedium): static
    {
        $this->utmMedium = $utmMedium;

        return $this;
    }

    public function setUtmCampaign(?string $utmCampaign): static
    {
        $this->utmCampaign = $utmCampaign;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/createAppointment';
    }

    protected function defaultBody(): array
    {
        $payload = [
            'doctor_id' => $this->doctorId,
            'clinic_id' => $this->clinicId,
            'time_start' => $this->timeStart instanceof DateTimeInterface ? $this->timeStart->format('d.m.Y H:i') : $this->timeStart,
            'time_end' => $this->timeEnd instanceof DateTimeInterface ? $this->timeEnd->format('d.m.Y H:i') : $this->timeEnd,
        ];

        if ($this->firstName !== null) {
            $payload['first_name'] = $this->firstName;
        }

        if ($this->lastName !== null) {
            $payload['last_name'] = $this->lastName;
        }

        if ($this->thirdName !== null) {
            $payload['third_name'] = $this->thirdName;
        }

        if ($this->birthDate !== null) {
            $payload['birth_date'] = $this->birthDate instanceof DateTimeInterface ? $this->birthDate->format('d.m.Y') : $this->birthDate;
        }

        if ($this->mobile !== null) {
            $payload['mobile'] = $this->mobile;
        }

        if ($this->gender !== null) {
            $payload['gender'] = $this->gender;
        }

        if ($this->email !== null) {
            $payload['email'] = $this->email;
        }

        if ($this->patientId !== null) {
            $payload['patient_id'] = $this->patientId;
        }

        if ($this->room !== null) {
            $payload['room'] = $this->room;
        }

        if ($this->channel !== null) {
            $payload['channel'] = $this->channel;
        }

        if ($this->source !== null) {
            $payload['source'] = $this->source;
        }

        if ($this->type !== null) {
            $payload['type'] = $this->type;
        }

        if ($this->comment !== null) {
            $payload['comment'] = $this->comment;
        }

        if ($this->isOutside !== null) {
            $payload['is_outside'] = $this->isOutside ? 1 : 0;
        }

        if ($this->isOutsideAddress !== null) {
            $payload['is_outside_address'] = $this->isOutsideAddress;
        }

        if ($this->isTelemedicine !== null) {
            $payload['is_telemedicine'] = $this->isTelemedicine ? 1 : 0;
        }

        if ($this->noSms !== null) {
            $payload['no_sms'] = $this->noSms ? 1 : 0;
        }

        if ($this->noEmail !== null) {
            $payload['no_email'] = $this->noEmail ? 1 : 0;
        }

        if ($this->isHandled !== null) {
            $payload['is_handled'] = $this->isHandled ? 1 : 0;
        }

        if ($this->movedFrom !== null) {
            $payload['moved_from'] = $this->movedFrom;
        }

        if ($this->checkIntersection !== null) {
            $payload['check_intersection'] = $this->checkIntersection ? 1 : 0;
        }

        if ($this->checkAge !== null) {
            $payload['check_age'] = $this->checkAge ? 1 : 0;
        }

        if ($this->services !== null) {
            $servicesData = APIMapper::getNormalizer()->normalize($this->services);
            $servicesData = array_map(static fn(array $service) => array_filter($service, static fn($val) => $val !== null), (array) $servicesData);

            $payload['services'] = json_encode($servicesData, JSON_THROW_ON_ERROR);
        }

        if ($this->utmSource !== null) {
            $payload['utm_source'] = $this->utmSource;
        }

        if ($this->utmMedium !== null) {
            $payload['utm_medium'] = $this->utmMedium;
        }

        if ($this->utmCampaign !== null) {
            $payload['utm_campaign'] = $this->utmCampaign;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return 'string';
    }
}
