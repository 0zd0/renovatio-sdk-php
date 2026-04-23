<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Clinic;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetClinicsRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetClinicsRequest());

    expect($response->status())->toBe(200);

    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(Clinic::class);
});
