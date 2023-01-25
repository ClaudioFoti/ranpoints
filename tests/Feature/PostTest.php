<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public $users;

    protected function setUp(): void
    {
        parent::setUp();

        $this->users = User::factory()->count(3)->create(['name' => 'John Smith']);
    }

    //Index tests
    public function test_post_index_unauthorized()
    {
        $response = $this->get('/posts');

        $response->assertStatus(302);
        $response->assertRedirectToRoute('login');
    }

    public function test_post_index_doesnt_contain_list()
    {
        $response = $this->actingAs($this->user)->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('No posts yet. Come back later or create a post!');
    }

    public function test_post_index_contains_list()
    {
        $posts = Post::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->get('/posts');

        $response->assertStatus(200);
        $response->assertSee($posts->first()->body);
        $response->assertViewHas('posts', fn () => $posts->count() === 3);
        $response->assertViewHas('posts', fn () => $posts->first()->author->name === 'John Doe');
    }

    //Show tests
    public function test_post_show_unauthorized()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->get('/posts/1');

        $response->assertStatus(302);
        $response->assertRedirectToRoute('login');
    }

    public function test_post_show_unexistent()
    {
        $response = $this->actingAs($this->user)->get('/posts/1');

        $response->assertStatus(404);
    }

    public function test_post_show_post()
    {
        $posts = Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->user)->get(route('posts.show', 1));

        $response->assertStatus(200);

        $response->assertSee($posts->first()->body);
        $response->assertSee('John Doe');
    }

    //Create tests
    public function test_post_create_unauthorized()
    {
        $response = $this->post(route('posts.store'),
            [
                'user_id' => $this->user->id,
                'body' => 'Testing body',
                'categories' => 'Testing, Categories',
                'parent_post_id' => null,
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirectToRoute('login');
    }

    public function test_post_create_no_body()
    {
        $response = $this->actingAs($this->user)->post(route('posts.store'),
            [
                'user_id' => $this->user->id,
                'body' => '',
                'categories' => '',
                'parent_post_id' => null,
            ]
        );

        $response->assertStatus(302);
        $response->assertInvalid([
            'body' => 'The body field is required.',
        ]);
    }

    public function test_post_create_post()
    {
        $response = $this->actingAs($this->user)->post(route('posts.store'),
            [
                'user_id' => $this->user->id,
                'body' => 'Testing body',
                'categories' => 'Testing, Categories',
                'parent_post_id' => null,
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirectToRoute('posts.index');

        $response = $this->actingAs($this->user)->get(route('posts.show', 1));

        $response->assertStatus(200);

        $response->assertSee('Testing body');
        $response->assertSee('John Doe');
        $response->assertSee('Testing');
        $response->assertSee('Categories');
    }

    //Update tests
    public function test_post_update_unauthorized()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->user)->put(route('posts.update', 1), [
            'body' => 'Testing body',
        ]);

        $response->assertStatus(403);
    }

    public function test_post_update_unexistent()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->admin)->put(route('posts.update', 10), [
            'body' => 'Testing body',
        ]);

        $response->assertStatus(404);
    }

    public function test_post_update_no_body()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->admin)->put(route('posts.update', 1), [
            'body' => '',
        ]);

        $response->assertStatus(302);
        $response->assertInvalid([
            'body' => 'The body field is required.',
        ]);
    }

    public function test_post_update_admin()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->admin)->put(route('posts.update', 1), [
            'body' => 'Testing body',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('posts.show', 1);
    }

    //Delete tests
    public function test_post_delete_unauthorized()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->user)->delete(route('posts.destroy', 1));

        $response->assertStatus(403);
    }

    public function test_post_delete_unexistent()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->user)->delete(route('posts.destroy', 10));

        $response->assertStatus(404);
    }

    public function test_post_delete_admin()
    {
        Post::factory()->count(3)->create(['user_id' => $this->user->id, 'parent_post_id' => null]);

        $response = $this->actingAs($this->admin)->delete(route('posts.destroy', 1));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('posts.index');
    }
}
