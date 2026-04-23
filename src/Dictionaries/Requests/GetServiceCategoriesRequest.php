<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\ServiceCategory;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetServiceCategoriesRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    private array|string|null $categoryId = null;
    private ?bool $includeSelf = null;
    private ?string $clinicId = null;

    public function setCategoryId(array|string|null $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function setIncludeSelf(bool $includeSelf = true): static
    {
        $this->includeSelf = $includeSelf;

        return $this;
    }

    public function setClinicId(?string $clinicId): static
    {
        $this->clinicId = $clinicId;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getServiceCategories';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        unset($payload['show_all']);

        if ($this->categoryId !== null) {
            $payload['category_id'] = is_array($this->categoryId) ? implode(',', $this->categoryId) : $this->categoryId;
        }

        if ($this->includeSelf !== null) {
            $payload['include_self'] = $this->includeSelf ? 1 : 0;
        }

        if ($this->clinicId !== null) {
            $payload['clinic_id'] = $this->clinicId;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return 'array<' . ServiceCategory::class . '>';
    }
}
