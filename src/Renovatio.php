<?php
declare(strict_types=1);

namespace Onepix\RenovatioSdk;

use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Connector;
use Saloon\Traits\Body\HasFormBody;

final class Renovatio extends Connector implements HasBody
{
    use HasFormBody;

    public function __construct(
        private readonly string $apiKey,
        private readonly ?string $proxy = null,
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

    protected function defaultConfig(): array
    {
        $config = [];

        if (!is_null($this->proxy)) {
            $config['proxy'] = $this->proxy;
        }

        return $config;
    }
}
