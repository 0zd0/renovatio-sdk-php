<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\Profession;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetProfessionsRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetProfessionsRequest());

    expect($response->status())->toBe(200);

    $json = $response->json();
    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(Profession::class);
});
