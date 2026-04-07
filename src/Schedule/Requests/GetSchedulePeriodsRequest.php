<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Schedule\Requests;

use DateTimeInterface;
use Onepix\RenovatioSdk\Schedule\DTO\SchedulePeriod;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Saloon\Enums\Method;

final class GetSchedulePeriodsRequest extends BaseRenovatioRequest
{
    protected Method $method = Method::POST;

    private array|string|null $clinicId = null;
    private array|string|null $roleId = null;
    private array|string|null $categoryId = null;
    private array|string|null $userId = null;
    private ?int $type = null;

    public function __construct(
        private DateTimeInterface|string $timeStart,
        private DateTimeInterface|string $timeEnd,
    ) {}

    public function setClinicId(array|string|null $clinicId): static
    {
        $this->clinicId = $clinicId;
        return $this;
    }

    public function setRoleId(array|string|null $roleId): static
    {
        $this->roleId = $roleId;
        return $this;
    }

    public function setCategoryId(array|string|null $categoryId): static
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function setUserId(array|string|null $userId): static
    {
        $this->userId = $userId;
        return $this;
    }

    public function setType(?int $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getSchedulePeriods';
    }

    protected function defaultBody(): array
    {
        $payload = [
            'time_start' => $this->timeStart instanceof DateTimeInterface ? $this->timeStart->format('d.m.Y H:i') : $this->timeStart,
            'time_end' => $this->timeEnd instanceof DateTimeInterface ? $this->timeEnd->format('d.m.Y H:i') : $this->timeEnd,
        ];

        if ($this->clinicId !== null) {
            $payload['clinic_id'] = is_array($this->clinicId) ? implode(',', $this->clinicId) : $this->clinicId;
        }

        if ($this->roleId !== null) {
            $payload['role_id'] = is_array($this->roleId) ? implode(',', $this->roleId) : $this->roleId;
        }

        if ($this->categoryId !== null) {
            $payload['category_id'] = is_array($this->categoryId) ? implode(',', $this->categoryId) : $this->categoryId;
        }

        if ($this->userId !== null) {
            $payload['user_id'] = is_array($this->userId) ? implode(',', $this->userId) : $this->userId;
        }

        if ($this->type !== null) {
            $payload['type'] = $this->type;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return 'array<' . SchedulePeriod::class . '>';
    }
}
