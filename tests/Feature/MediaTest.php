<?php

namespace Tests\Feature;

use App\Models\Media;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MediaTest extends TestCase
{
    use WithFaker;
    /**
     * list all categories
     *
     * @return void
     */
    public function test_can_view_list_of_media()
    {
        $response = $this->get('/api/media', [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ]);
        $response->assertStatus(200);
    }

    public function test_user_can_create_media()
    {
        $data = [
            'name' => $this->faker->name,
            'category_id' => 1,
        ];
        $this->json('post','api/media/store', $data, [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])
            ->assertStatus(201);
    }

    public function test_user_can_view_a_media()
    {
        $media = Media::first();
        $this->get('api/media/show/'.$media->id,[
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->assertStatus(200);
    }


    public function test_user_can_edit_media()
    {
        $media = Media::first();
        $data = [
            'name' => $this->faker->name,
            'category_id' => $media->category_id
        ];
        
        $this->json('put','api/media/update/'.$media->id, $data, [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])
            ->assertStatus(204);
    }

    public function test_user_can_delete_media()
    {
        $media = Media::first();
        $this->delete('api/media/delete'.$media->id,[
            'Authorization' => 'Bearer'. $this->getToken()
        ])->assertStatus(200);
    }
}
