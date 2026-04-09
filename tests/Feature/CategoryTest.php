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

test('category show screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->get(route('category.show', $category));

    $response->assertSuccessful();
    $response->assertSee('Laravel');
});

test('category edit screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->get(route('category.edit', $category));

    $response->assertSuccessful();
    $response->assertSee('Save changes');
});

test('category can be updated', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->put(route('category.update', $category), [
        'title' => 'PHP',
    ]);

    $response->assertRedirect(route('category.index', absolute: false));

    expect($category->fresh()?->title)->toBe('PHP');
});

test('category can be deleted', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->delete(route('category.destroy', $category));

    $response->assertRedirect(route('category.index', absolute: false));
    $this->assertModelMissing($category);
});
