<?php

test('visitors can submit consultation and quote inquiries', function () {
    $response = $this->post('/leads', [
        'name' => 'Rahul Sharma',
        'phone' => '9826012345',
        'service_type' => 'Modular Kitchen',
        'location' => 'Vijay Nagar, Indore',
        'message' => 'Need 12x10 L-shaped kitchen design',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('leads', [
        'name' => 'Rahul Sharma',
        'phone' => '9826012345',
        'location' => 'Vijay Nagar, Indore',
    ]);
});

test('lead submission validates required fields', function () {
    $response = $this->post('/leads', [
        'name' => '',
        'phone' => '123',
    ]);

    $response->assertSessionHasErrors(['name', 'phone']);
});
