<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\ServiceType;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetServiceTypesRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetServiceTypesRequest());

    expect($response->status())->toBe(200);

    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(ServiceType::class);
});
