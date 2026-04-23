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

    protected function normalizeResponseData(array $data): array
    {
        return $data;
    }

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

        $payload = $this->normalizeResponseData($data['data'] ?? []);

        try {
            return APIMapper::get()->map(
                $this->getDtoClass(),
                $payload,
            );
        } catch (MappingError $exception) {
            throw new RenovatioApiException(
                $this->formatMappingErrors($exception),
            );
        }
    }

    private function formatMappingErrors(MappingError $exception, int $limit = 5): string
    {
        $errors = [];
        $count = 0;

        foreach ($exception->messages() as $message) {
            $path = $message->path();
            $key = $path === '' ? 'root' : $path;

            $errors[$key] = (string) $message;
            $count++;

            if ($count >= $limit) {
                break;
            }
        }

        return json_encode(
            [
                'summary' => sprintf('DTO Mapping failed. Showing first %d errors.', $limit),
                'errors' => $errors,
            ],
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR,
        );
    }
}
