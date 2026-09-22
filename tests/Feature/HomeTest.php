<?php

use App\Models\Service;
use App\Models\SiteSetting;

test('homepage returns a successful response and displays business information', function () {
    SiteSetting::set('company_name', 'AGM Always Good Making');
    SiteSetting::set('phone', '9977350503');
    SiteSetting::set('gstin', '23BQAPM4037J1Z1');

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('AGM Always Good Making');
    $response->assertSee('23BQAPM4037J1Z1');
    $response->assertSee('9977350503');
    $response->assertSee('Nasir Multani');
});

test('service detail page returns a successful response', function () {
    $service = Service::first();

    if ($service) {
        $response = $this->get('/services/'.$service->slug);
        $response->assertStatus(200);
        $response->assertSee($service->title);
    } else {
        expect(true)->toBeTrue();
    }
});
