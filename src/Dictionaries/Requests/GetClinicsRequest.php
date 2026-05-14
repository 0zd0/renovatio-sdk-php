<?php

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Clinic;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetClinicsRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/getClinics';
    }

    protected function defaultBody(): array
    {
        return $this->getVisibilityPayload();
    }

    protected function getDtoClass(): string
    {
        return Clinic::class . '[]';
    }
}
