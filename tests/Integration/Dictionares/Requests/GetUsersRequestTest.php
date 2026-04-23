<?php

namespace Tests\Integration\Dictionares\Requests;

use Onepix\RenovatioSdk\Dictionaries\DTO\User;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetUsersRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetUsersRequest());

    expect($response->status())->toBe(200);

    $json = $response->json();
    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(User::class);
});
