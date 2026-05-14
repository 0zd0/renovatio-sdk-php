<?php

declare(strict_types=1);

namespace Onepix\RenovatioSdk\Dictionaries\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\ServiceType;
use Onepix\RenovatioSdk\Shared\Requests\BaseRenovatioRequest;
use Onepix\RenovatioSdk\Shared\Requests\Traits\HasVisibilityFilters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;

final class GetServiceTypesRequest extends BaseRenovatioRequest implements HasBody
{
    use HasVisibilityFilters;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/getServiceTypes';
    }

    protected function defaultBody(): array
    {
        $payload = $this->getVisibilityPayload();

        unset($payload['show_all'], $payload['source']);

        return $payload;
    }

    protected function getDtoClass(): string
    {
        return ServiceType::class . '[]';
    }
}
