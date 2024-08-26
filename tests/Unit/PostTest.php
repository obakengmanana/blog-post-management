<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the creation of a post.
     */
    public function test_create_post()
    {
        $user = User::factory()->create();

        

        $this->actingAs($user);

        $response = $this->post('/posts', [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
        ]);

        $response->assertStatus(302); // Redirects after creation
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
        ]);
    }

    /**
     * Test reading (viewing) a post.
     */
    public function test_read_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

       

        $this->actingAs($user);

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    /**
     * Test updating a post.
     */
    public function test_update_post()
    {
        // Ensure the user is the author of the post
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
    
        $this->actingAs($user);
    
        $response = $this->put('/posts/' . $post->id, [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);
    
        $response->assertStatus(302); // Expect a redirect after update
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
        ]);
    }
    

    /**
     * Test deleting a post.
     */
    public function test_delete_post()
    {
        // Ensure the user is the author of the post
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
    
        $this->actingAs($user);
    
        $response = $this->delete('/posts/' . $post->id);
    
        $response->assertStatus(302); // Expect a redirect after deletion
        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
    
}
