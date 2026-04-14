<?php

use Onepix\RenovatioSdk\Dictionaries\DTO\Clinic;
use Onepix\RenovatioSdk\Dictionaries\Requests\GetClinicsRequest;
use Onepix\RenovatioSdk\Renovatio;

it('test api', function () {
    $renovatio = new Renovatio($_ENV['API_KEY'], $_ENV['PROXY']);

    $response = $renovatio->send(
        new GetClinicsRequest(),
    );
    /**
     * @var Clinic[] $clinics
     */
    $clinics = $response->dto();

    expect($clinics)->toContainOnlyInstancesOf(Clinic::class);
});
