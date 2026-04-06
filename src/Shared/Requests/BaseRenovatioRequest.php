<?php

namespace Onepix\RenovatioSdk\Shared\Requests;

use CuyZ\Valinor\Mapper\MappingError;
use JsonException;
use Onepix\RenovatioSdk\Shared\Exceptions\RenovatioApiException;
use Onepix\RenovatioSdk\Shared\Support\APIMapper;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;

abstract class BaseRenovatioRequest extends Request
{
    use HasFormBody;

    abstract protected function getDtoClass(): string;

    /**
     * @throws RenovatioApiException
     * @throws MappingError|JsonException
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();

        if (isset($data['error']) && $data['error'] === 1) {
            throw new RenovatioApiException(
                $data['data']['desc'] ?? 'Unknown API Error',
                $data['data']['code'] ?? 0,
            );
        }

        $payload = $data['data'] ?? [];

        return APIMapper::get()->map($this->getDtoClass(), $payload);
    }
}
