<?php

use App\Models\Category;
use App\Models\User;

test('category create screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get(route('category.create'));

    $response->assertSuccessful();
});

test('category can be created', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->post(route('category.store'), [
        'title' => 'Laravel',
    ]);

    $category = Category::query()->first();

    expect($category)->not->toBeNull();
    expect($category?->title)->toBe('Laravel');

    $this->assertModelExists($category);
    $response->assertRedirect(route('category.index', absolute: false));
});
