<?php

use App\Models\Lead;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

test('unauthenticated users are redirected from admin area to login', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/login');
});

test('admin can log in with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'admin_test@agmalwaysgoodmaking.in',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/admin/login', [
        'email' => 'admin_test@agmalwaysgoodmaking.in',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/admin');
    $this->assertAuthenticatedAs($user);
});

test('admin can view leads and update status', function () {
    $user = User::factory()->create();
    $lead = Lead::create([
        'name' => 'Amit Verma',
        'phone' => '9988776655',
        'service_type' => 'Sliding Wardrobe',
        'status' => 'new',
    ]);

    $response = $this->actingAs($user)->patch("/admin/leads/{$lead->id}/status", [
        'status' => 'contacted',
    ]);

    $response->assertRedirect();
    $this->assertEquals('contacted', $lead->fresh()->status);
});

test('admin can upload a work photo to portfolio', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $file = UploadedFile::fake()->image('test_kitchen.jpg', 600, 600);

    $response = $this->actingAs($user)->post('/admin/portfolio', [
        'title' => 'Test Kitchen Work',
        'category' => 'modular_kitchen',
        'photo' => $file,
        'caption' => 'Installed at Saket Indore',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('portfolio_items', [
        'title' => 'Test Kitchen Work',
        'category' => 'modular_kitchen',
    ]);
});

test('admin can create a service without specifying price_unit', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/services', [
        'title' => 'Italian Sliding Kitchen',
        'category' => 'modular_kitchen',
        'starting_price' => '1200',
        'description' => 'Premium Italian style kitchen.',
    ]);

    $response->assertRedirect('/admin/services');
    $this->assertDatabaseHas('services', [
        'title' => 'Italian Sliding Kitchen',
        'category' => 'modular_kitchen',
        'starting_price' => '1200',
        'price_unit' => '/sq ft',
    ]);
});

test('admin can create a service with custom price_unit and update it', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/services', [
        'title' => 'Aluminium Sliding Partition',
        'category' => 'glazing',
        'starting_price' => '450',
        'price_unit' => '/running ft',
    ]);

    $response->assertRedirect('/admin/services');
    $service = Service::where('title', 'Aluminium Sliding Partition')->first();
    $this->assertNotNull($service);
    $this->assertEquals('/running ft', $service->price_unit);

    $updateResponse = $this->actingAs($user)->put("/admin/services/{$service->id}", [
        'title' => 'Aluminium Sliding Partition Updated',
        'category' => 'glazing',
        'starting_price' => '500',
        'price_unit' => '/sq ft',
    ]);

    $updateResponse->assertRedirect('/admin/services');
    $this->assertEquals('500', $service->fresh()->starting_price);
    $this->assertEquals('/sq ft', $service->fresh()->price_unit);
});

test('admin can update password with valid current password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old_password123'),
    ]);

    $response = $this->actingAs($user)->put('/admin/settings/password', [
        'current_password' => 'old_password123',
        'password' => 'new_password123',
        'password_confirmation' => 'new_password123',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertTrue(Hash::check('new_password123', $user->fresh()->password));
});

test('admin cannot update password with invalid current password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old_password123'),
    ]);

    $response = $this->actingAs($user)->put('/admin/settings/password', [
        'current_password' => 'wrong_password',
        'password' => 'new_password123',
        'password_confirmation' => 'new_password123',
    ]);

    $response->assertSessionHasErrors('current_password');
    $this->assertTrue(Hash::check('old_password123', $user->fresh()->password));
});

test('admin can update login profile name and email', function () {
    $user = User::factory()->create([
        'name' => 'Nasir Multani',
        'email' => 'old_email@agmalwaysgoodmaking.in',
    ]);

    $response = $this->actingAs($user)->put('/admin/settings/profile', [
        'name' => 'Nasir Multani Updated',
        'email' => 'new_email@agmalwaysgoodmaking.in',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertEquals('new_email@agmalwaysgoodmaking.in', $user->fresh()->email);
});
