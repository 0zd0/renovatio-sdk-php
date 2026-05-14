<?php

namespace Onepix\RenovatioSdk\Shared\Requests;

use JsonException;
use Onepix\RenovatioSdk\Shared\Exceptions\RenovatioApiException;
use Onepix\RenovatioSdk\Shared\Support\APIMapper;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\PartialDenormalizationException;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

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
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();
        $timezone = $response->getConnector()->getTimezone();

        if (isset($data['error']) && $data['error'] === 1) {
            throw new RenovatioApiException(
                $data['data']['desc'] ?? 'Unknown API Error',
                $data['data']['code'] ?? 0,
            );
        }

        $payload = $this->normalizeResponseData($data['data'] ?? []);

        try {
            return APIMapper::getSerializer()->denormalize(
                $payload,
                $this->getDtoClass(),
                null,
                [
                    DenormalizerInterface::COLLECT_DENORMALIZATION_ERRORS => true,
                    DateTimeNormalizer::FORCE_TIMEZONE_KEY => true,
                    DateTimeNormalizer::TIMEZONE_KEY => $timezone,
                ],
            );
        } catch (PartialDenormalizationException $exception) {
            throw new RenovatioApiException(
                $this->formatMappingErrors($exception),
            );
        } catch (ExceptionInterface $exception) {
            throw new RenovatioApiException(
                sprintf('DTO Mapping failed: %s', $exception->getMessage()),
            );
        }
    }

    private function formatMappingErrors(PartialDenormalizationException $exception, int $limit = 5): string
    {
        $errors = [];
        $count = 0;

        foreach ($exception->getErrors() as $error) {
            $path = $error->getPath() ?? 'root';

            $errors[$path] = $error->getMessage();
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
