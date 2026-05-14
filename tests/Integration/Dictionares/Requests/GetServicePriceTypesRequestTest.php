<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\ServicePriceType;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetServicePriceTypesRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetServicePriceTypesRequest());

    expect($response->status())->toBe(200);

    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(ServicePriceType::class);
});
