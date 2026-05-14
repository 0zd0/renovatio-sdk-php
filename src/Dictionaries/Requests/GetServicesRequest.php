<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Service;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetServicesRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    private array|string|null $serviceId = null;
    private array|string|null $categoryId = null;
    private ?bool $showChildren = null;
    private ?string $professionId = null;
    private ?string $clinicId = null;
    private ?string $typeId = null;
    private array|string|null $userId = null;
    private ?string $userMode = null;
    private ?string $term = null;
    private ?int $limit = null;

    public function setServiceId(array|string|null $serviceId): static
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function setCategoryId(array|string|null $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function setShowChildren(bool $showChildren = true): static
    {
        $this->showChildren = $showChildren;

        return $this;
    }

    public function setProfessionId(?string $professionId): static
    {
        $this->professionId = $professionId;

        return $this;
    }

    public function setClinicId(?string $clinicId): static
    {
        $this->clinicId = $clinicId;

        return $this;
    }

    public function setTypeId(?string $typeId): static
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function setUserId(array|string|null $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function setUserMode(?string $userMode): static
    {
        $this->userMode = $userMode;

        return $this;
    }

    public function setTerm(?string $term): static
    {
        $this->term = $term;

        return $this;
    }

    public function setLimit(?int $limit): static
    {
        $this->limit = $limit;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getServices';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        if ($this->serviceId !== null) {
            $payload['service_id'] = is_array($this->serviceId) ? implode(',', $this->serviceId) : $this->serviceId;
        }

        if ($this->categoryId !== null) {
            $payload['category_id'] = is_array($this->categoryId) ? implode(',', $this->categoryId) : $this->categoryId;
        }

        if ($this->showChildren !== null) {
            $payload['show_children'] = $this->showChildren ? 1 : 0;
        }

        if ($this->professionId !== null) {
            $payload['profession_id'] = $this->professionId;
        }

        if ($this->clinicId !== null) {
            $payload['clinic_id'] = $this->clinicId;
        }

        if ($this->typeId !== null) {
            $payload['type_id'] = $this->typeId;
        }

        if ($this->userId !== null) {
            $payload['user_id'] = is_array($this->userId) ? implode(',', $this->userId) : $this->userId;
        }

        if ($this->userMode !== null) {
            $payload['user_mode'] = $this->userMode;
        }

        if ($this->term !== null) {
            $payload['term'] = $this->term;
        }

        if ($this->limit !== null) {
            $payload['limit'] = $this->limit;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return Service::class . '[]';
    }
}
