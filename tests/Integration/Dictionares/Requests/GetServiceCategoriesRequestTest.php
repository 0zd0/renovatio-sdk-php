<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\ServiceCategory;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetServiceCategoriesRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetServiceCategoriesRequest());

    expect($response->status())->toBe(200);

    $json = $response->json();
    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(ServiceCategory::class);
});
