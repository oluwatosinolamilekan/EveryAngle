<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
    }

    protected function setUpUser()
    {
        return User::factory()
            ->create(['password' => Hash::make('password')]);
    }

    protected function makePost($route, $data)
    {
        return $this->post($route, $data, ['Accept' => 'application/json']);
    }

    protected function makeGet($route)
    {
        return $this->post($route, ['Accept' => 'application/json']);
    }

    protected function getToken()
    {
        $user = User::factory()->create();
        $tokenResult = $user->createToken('UnitTest');
        $token = $tokenResult->token;
        $token->save();
        return $tokenResult->accessToken;
    }
}
