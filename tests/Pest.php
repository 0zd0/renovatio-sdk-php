<?php

use Dotenv\Dotenv;
use Onepix\RenovatioSdk\Renovatio;
use Tests\TestCase;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

pest()->extend(TestCase::class)->in('Feature');
pest()->extend(TestCase::class)->in('Integration');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/**
 * @return Renovatio
 */
function sdk(): Renovatio
{
    return new Renovatio(
        apiKey: $_ENV['API_KEY'],
        domain: $_ENV['API_DOMAIN'],
        proxy: $_ENV['PROXY'] ?? null,
    );
}
