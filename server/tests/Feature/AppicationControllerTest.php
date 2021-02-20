<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppicationControllerTest extends TestCase
{
    use RefreshDatabase;

    // TopページへアクセスするとStatus200が返されるか
    public function testShowApplications()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('welcome');
    }

    // 未ログイン時にTopの使用するをクリックするとログイン画面にリダイレクトする
    public function testGuestUseApplication()
    {
        $response = $this->get(route('todo'));

        $response->assertRedirect(route('login'));
    }
}
