<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_can_login()
    {
        Session::start();
        $user = $this->setUpUser();
        $data = ['email' => $user->email, 'password' => 'password'];
        $response = $this->makePost('/api/login', $data);
        $response->assertStatus(200);
    }

    public function test_an_unauthenticated_user_cannot_access_authenticated_resource()
    {
        $response = $this->getJson('/api/profile');
        $response->assertStatus(401);
    }
}
