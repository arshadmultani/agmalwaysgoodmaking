<?php

use App\Models\Category;
use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\User;

test('unauthenticated users cannot access categories management', function () {
    $response = $this->get('/admin/categories');

    $response->assertRedirect('/login');
});

test('admin can view categories list with counts', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/categories');

    $response->assertOk();
    $response->assertSee('Modular Kitchen');
    $response->assertSee('Service Categories');
});

test('admin can create a new category with auto-generated slug', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/categories', [
        'name' => 'Wooden Flooring',
        'description' => 'Hardwood and laminated flooring options',
        'sort_order' => 7,
    ]);

    $response->assertRedirect('/admin/categories');
    $this->assertDatabaseHas('categories', [
        'name' => 'Wooden Flooring',
        'slug' => 'wooden_flooring',
        'sort_order' => 7,
    ]);
});

test('admin can update a category and linked services cascade to new slug', function () {
    $user = User::factory()->create();

    $category = Category::create([
        'name' => 'Original Category',
        'slug' => 'original_category',
        'sort_order' => 10,
    ]);

    $service = Service::create([
        'slug' => 'sample-service-test-123',
        'title' => 'Sample Service',
        'category' => 'original_category',
        'price_unit' => '/sq ft',
    ]);

    $portfolio = PortfolioItem::create([
        'title' => 'Sample Photo',
        'category' => 'original_category',
        'image_path' => 'portfolio/test.webp',
    ]);

    $response = $this->actingAs($user)->put("/admin/categories/{$category->id}", [
        'name' => 'Updated Category',
        'slug' => 'updated_category',
        'sort_order' => 12,
    ]);

    $response->assertRedirect('/admin/categories');
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Updated Category',
        'slug' => 'updated_category',
        'sort_order' => 12,
    ]);

    // Check cascade
    $this->assertEquals('updated_category', $service->fresh()->category);
    $this->assertEquals('updated_category', $portfolio->fresh()->category);
});

test('admin cannot delete a category that has linked services or portfolio items', function () {
    $user = User::factory()->create();

    $category = Category::where('slug', 'modular_kitchen')->first();
    $this->assertNotNull($category);

    Service::create([
        'slug' => 'test-kitchen-service',
        'title' => 'Test Kitchen Service',
        'category' => 'modular_kitchen',
        'price_unit' => '/sq ft',
    ]);

    $response = $this->actingAs($user)->delete("/admin/categories/{$category->id}");

    $response->assertRedirect();
    $response->assertSessionHasErrors('category_error');
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
    ]);
});

test('admin can delete an empty category', function () {
    $user = User::factory()->create();

    $category = Category::create([
        'name' => 'Temporary Empty Category',
        'slug' => 'temp_empty',
        'sort_order' => 99,
    ]);

    $response = $this->actingAs($user)->delete("/admin/categories/{$category->id}");

    $response->assertRedirect('/admin/categories');
    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
});

test('homepage displays active categories in services and gallery filter tabs', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Modular Kitchen');
    $response->assertSee('Sliding Wardrobe');
});
