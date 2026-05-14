<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\User;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetUsersRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    private array|string|null $userId = null;
    private ?string $clinicId = null;
    private ?string $professionId = null;
    private ?string $role = null;
    private ?string $carNumber = null;
    private array|string|null $serviceId = null;
    private ?string $serviceMode = null;
    private ?bool $withServices = null;
    private ?bool $isOutside = null;
    private ?bool $isTelemedicine = null;

    public function setUserId(array|string|null $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function setClinicId(?string $clinicId): static
    {
        $this->clinicId = $clinicId;

        return $this;
    }

    public function setProfessionId(?string $professionId): static
    {
        $this->professionId = $professionId;

        return $this;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function setCarNumber(?string $carNumber): static
    {
        $this->carNumber = $carNumber;

        return $this;
    }

    public function setServiceId(array|string|null $serviceId): static
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function setServiceMode(?string $serviceMode): static
    {
        $this->serviceMode = $serviceMode;

        return $this;
    }

    public function setWithServices(?bool $withServices = true): static
    {
        $this->withServices = $withServices;

        return $this;
    }

    public function setIsOutside(?bool $isOutside = true): static
    {
        $this->isOutside = $isOutside;

        return $this;
    }

    public function setIsTelemedicine(?bool $isTelemedicine = true): static
    {
        $this->isTelemedicine = $isTelemedicine;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getUsers';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        if ($this->userId !== null) {
            $payload['user_id'] = is_array($this->userId) ? implode(',', $this->userId) : $this->userId;
        }

        if ($this->clinicId !== null) {
            $payload['clinic_id'] = $this->clinicId;
        }

        if ($this->professionId !== null) {
            $payload['profession_id'] = $this->professionId;
        }

        if ($this->role !== null) {
            $payload['role'] = $this->role;
        }

        if ($this->carNumber !== null) {
            $payload['car_number'] = $this->carNumber;
        }

        if ($this->serviceId !== null) {
            $payload['service_id'] = is_array($this->serviceId) ? implode(',', $this->serviceId) : $this->serviceId;
        }

        if ($this->serviceMode !== null) {
            $payload['service_mode'] = $this->serviceMode;
        }

        if ($this->withServices !== null) {
            $payload['with_services'] = $this->withServices ? 1 : 0;
        }

        if ($this->isOutside !== null) {
            $payload['is_outside'] = $this->isOutside ? 1 : 2;
        }

        if ($this->isTelemedicine !== null) {
            $payload['is_telemedicine'] = $this->isTelemedicine ? 1 : 2;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return User::class . '[]';
    }
}
