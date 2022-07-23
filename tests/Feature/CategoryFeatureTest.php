<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use WithFaker;
    /**
     * list all categories
     *
     * @return void
     */
    public function test_can_view_list_of_category()
    {
        $response = $this->get('/api/category', [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ]);
        $response->assertStatus(200);
    }

    public function test_user_can_view_a_media()
    {
        $category = Category::first();
        $this->get('api/category/show/'.$category->id,[
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->assertStatus(200);
    }

    public function test_user_can_create_category()
    {
        $data = [
            'name' => $this->faker->name
        ];
        $this->json('post','api/category/store', $data, [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])
            ->assertStatus(201);
    }

    public function test_user_can_edit_category()
    {
        $data = [
            'name' => $this->faker->name
        ];
        $category = Category::first();
        $this->json('put','api/category/update/'.$category->id, $data, [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getToken()
        ])
            ->assertStatus(204);
    }

    public function test_user_can_delete_category()
    {
        $category = Category::first();
        $this->delete('api/category/delete'.$category->id,[
            'Authorization' => 'Bearer'. $this->getToken()
        ])->assertStatus(200);
    }
}
