<?php

namespace Tests\Integration\Schedule;

use Onepix\RenovatioSdk\Schedule\DTO\ScheduleSlot;
use Onepix\RenovatioSdk\Schedule\Requests\GetScheduleRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetScheduleRequest());

    expect($response->status())->toBe(200);

    $j = $response->json();
    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(ScheduleSlot::class);
});
