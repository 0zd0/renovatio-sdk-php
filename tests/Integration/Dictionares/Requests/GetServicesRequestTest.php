<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Service;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetServicesRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetServicesRequest());

    expect($response->status())->toBe(200);

    $json = $response->json();
    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(Service::class);
});
