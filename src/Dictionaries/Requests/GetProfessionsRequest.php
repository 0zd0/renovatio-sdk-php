<?php

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Profession;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetProfessionsRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    private bool $withoutDoctors = false;

    public function setWithoutDoctors(bool $withoutDoctors = true): static
    {
        $this->withoutDoctors = $withoutDoctors;

        return $this;
    }

    public function resolveEndpoint(): string
    {
        return '/getProfessions';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        if ($this->withoutDoctors) {
            $payload['without_doctors'] = 1;
        }

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return Profession::class . '[]';
    }
}
