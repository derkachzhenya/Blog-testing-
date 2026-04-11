<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

test('post index screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $tag = Tag::query()->create([
        'title' => 'PHP',
    ]);

    $post = Post::query()->create([
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
        'category_id' => $category->id,
    ]);

    $post->tags()->attach($tag->id);

    $response = $this->get(route('post.index'));

    $response->assertSuccessful();
    $response->assertSee('Laravel CRUD');
    $response->assertSee('Laravel');
    $response->assertSee('PHP');
});

test('post create screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get(route('post.create'));

    $response->assertSuccessful();
});

test('post can be created', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $tag = Tag::query()->create([
        'title' => 'PHP',
    ]);

    $response = $this->post(route('post.store'), [
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
        'category_id' => $category->id,
        'tags' => [$tag->id],
    ]);

    $post = Post::query()->first();

    expect($post)->not->toBeNull();
    expect($post?->title)->toBe('Laravel CRUD');
    expect($post?->content)->toBe('Post body');
    expect($post?->category_id)->toBe($category->id);
    expect($post?->tags()->whereKey($tag->id)->exists())->toBeTrue();

    $this->assertModelExists($post);
    $response->assertRedirect(route('post.index', absolute: false));
});

test('post show screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $post = Post::query()->create([
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
    ]);

    $response = $this->get(route('post.show', $post));

    $response->assertSuccessful();
    $response->assertSee('Laravel CRUD');
    $response->assertSee('Post body');
});

test('post edit screen can be rendered', function () {
    $this->actingAs(User::factory()->create());

    $post = Post::query()->create([
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
    ]);

    $response = $this->get(route('post.edit', $post));

    $response->assertSuccessful();
    $response->assertSee('Save changes');
});

test('post can be updated', function () {
    $this->actingAs(User::factory()->create());

    $category = Category::query()->create([
        'title' => 'Laravel',
    ]);

    $tag = Tag::query()->create([
        'title' => 'PHP',
    ]);

    $post = Post::query()->create([
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
    ]);

    $response = $this->put(route('post.update', $post), [
        'title' => 'Updated CRUD',
        'content' => 'Updated body',
        'category_id' => $category->id,
        'tags' => [$tag->id],
    ]);

    $response->assertRedirect(route('post.index', absolute: false));

    expect($post->fresh()?->title)->toBe('Updated CRUD');
    expect($post->fresh()?->content)->toBe('Updated body');
    expect($post->fresh()?->category_id)->toBe($category->id);
    expect($post->fresh()?->tags()->whereKey($tag->id)->exists())->toBeTrue();
});

test('post can be deleted', function () {
    $this->actingAs(User::factory()->create());

    $post = Post::query()->create([
        'title' => 'Laravel CRUD',
        'content' => 'Post body',
    ]);

    $response = $this->delete(route('post.destroy', $post));

    $response->assertRedirect(route('post.index', absolute: false));
    $this->assertModelMissing($post);
});
