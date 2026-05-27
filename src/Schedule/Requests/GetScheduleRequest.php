<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\Requests;

use DateTimeInterface;
use Onepix\RenovatioSdk\Schedule\DTO\DoctorScheduleSlot;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetScheduleRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    private string|int|null $clinicId = null;
    private array|string|int|null $userId = null;
    private string|int|null $serviceId = null;
    private DateTimeInterface|string|null $timeStart = null;
    private DateTimeInterface|string|null $timeEnd = null;
    private ?string $room = null;
    private int|string|null $step = null;
    private ?bool $useDoctorAvgTime = null;
    private ?bool $allClinics = null;
    private ?bool $showBusy = null;
    private ?bool $showPast = null;
    private ?string $mode = null;

    public function setClinicId(string|int|null $clinicId): static
    {
        $this->clinicId = $clinicId;

        return $this;
    }

    public function setUserId(array|string|int|null $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function setServiceId(string|int|null $serviceId): static
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function setTimeStart(DateTimeInterface|string|null $timeStart): static
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function setTimeEnd(DateTimeInterface|string|null $timeEnd): static
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    public function setRoom(?string $room): static
    {
        $this->room = $room;

        return $this;
    }

    public function setStep(int|string|null $step): static
    {
        $this->step = $step;

        return $this;
    }

    public function setUseDoctorAvgTime(bool $useDoctorAvgTime = true): static
    {
        $this->useDoctorAvgTime = $useDoctorAvgTime;

        return $this;
    }

    public function setAllClinics(bool $allClinics = true): static
    {
        $this->allClinics = $allClinics;

        return $this;
    }

    public function setShowBusy(bool $showBusy = true): static
    {
        $this->showBusy = $showBusy;

        return $this;
    }

    public function setShowPast(bool $showPast = true): static
    {
        $this->showPast = $showPast;

        return $this;
    }

    public function setMode(?string $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getSchedule';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        unset($payload['show_deleted']);

        if ($this->clinicId !== null) {
            $payload['clinic_id'] = $this->clinicId;
        }

        if ($this->userId !== null) {
            $payload['user_id'] = is_array($this->userId) ? implode(',', $this->userId) : $this->userId;
        }

        if ($this->serviceId !== null) {
            $payload['service_id'] = $this->serviceId;
        }

        if ($this->timeStart !== null) {
            $payload['time_start'] = $this->timeStart instanceof DateTimeInterface ? $this->timeStart->format('d.m.Y H:i') : $this->timeStart;
        }

        if ($this->timeEnd !== null) {
            $payload['time_end'] = $this->timeEnd instanceof DateTimeInterface ? $this->timeEnd->format('d.m.Y H:i') : $this->timeEnd;
        }

        if ($this->room !== null) {
            $payload['room'] = $this->room;
        }

        if ($this->step !== null) {
            $payload['step'] = $this->step;
        }

        if ($this->useDoctorAvgTime !== null) {
            $payload['use_doctor_avg_time'] = $this->useDoctorAvgTime ? 1 : 0;
        }

        if ($this->allClinics !== null) {
            $payload['all_clinics'] = $this->allClinics ? 1 : 0;
        }

        if ($this->showBusy !== null) {
            $payload['show_busy'] = $this->showBusy ? 1 : 0;
        }

        if ($this->showPast !== null) {
            $payload['show_past'] = $this->showPast ? 1 : 0;
        }

        if ($this->mode !== null) {
            $payload['mode'] = $this->mode;
        }

        return $payload;
    }

    protected function normalizeResponseData(mixed $data): array
    {
        $normalized = [];

        foreach ($data as $id => $slots) {
            $normalized[] = [
                'id' => (int) $id,
                'slots' => $slots,
            ];
        }

        return $normalized;
    }

    protected function getDtoClass(): string
    {
        return DoctorScheduleSlot::class . '[]';
    }
}
