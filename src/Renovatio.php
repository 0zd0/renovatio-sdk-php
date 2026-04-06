<?php
declare(strict_types=1);

namespace Onepix\RenovatioSdk;

use Saloon\Http\Connector;
use Saloon\Traits\Body\HasFormBody;

class Renovatio extends Connector
{
    use HasFormBody;

    public function __construct(
        private readonly string $apiKey,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://app.rnova.org/api/public';
    }

    protected function defaultBody(): array
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}
