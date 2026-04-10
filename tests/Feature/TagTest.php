<?php

use App\Models\Tag;
use App\Models\User;

test('tag index screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    Tag::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->get(route('tag.index'));

    $response->assertSuccessful();
    $response->assertSee('Laravel');
});

test('tag create screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get(route('tag.create'));

    $response->assertSuccessful();
});

test('tag can be created', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->post(route('tag.store'), [
        'title' => 'Laravel',
    ]);

    $tag = Tag::query()->first();

    expect($tag)->not->toBeNull();
    expect($tag?->title)->toBe('Laravel');

    $this->assertModelExists($tag);
    $response->assertRedirect(route('tag.index', absolute: false));
});

test('tag show screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $tag = Tag::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->get(route('tag.show', $tag));

    $response->assertSuccessful();
    $response->assertSee('Laravel');
});

test('tag edit screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $tag = Tag::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->get(route('tag.edit', $tag));

    $response->assertSuccessful();
    $response->assertSee('Save changes');
});

test('tag can be updated', function () {
    $this->actingAs(User::factory()->create());

    $tag = Tag::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->put(route('tag.update', $tag), [
        'title' => 'PHP',
    ]);

    $response->assertRedirect(route('tag.index', absolute: false));

    expect($tag->fresh()?->title)->toBe('PHP');
});

test('tag can be deleted', function () {
    $this->actingAs(User::factory()->create());

    $tag = Tag::query()->create([
        'title' => 'Laravel',
    ]);

    $response = $this->delete(route('tag.destroy', $tag));

    $response->assertRedirect(route('tag.index', absolute: false));
    $this->assertModelMissing($tag);
});
