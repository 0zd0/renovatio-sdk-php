<?php

namespace Tests\Integration\Schedule;

use DateTime;
use Onepix\RenovatioSdk\Schedule\DTO\SchedulePeriod;
use Onepix\RenovatioSdk\Schedule\Requests\GetSchedulePeriodsRequest;

it('the correctness of DTO in production', function () {
    $response = sdk()->send(new GetSchedulePeriodsRequest(
        new DateTime('now'),
        new DateTime('+1 day'),
    ));

    expect($response->status())->toBe(200);

    $dto = $response->dto();

    expect($dto)
        ->toBeArray()
        ->not->toBeEmpty()
        ->toContainOnlyInstancesOf(SchedulePeriod::class);
});
