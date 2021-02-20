<?php

namespace Tests\Feature;

use App\Models\User;
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

    // ログイン状態でTopの使用するをクリックすると選択アプリに遷移

    public function testAuthUserApplication()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('todo'));

        $response->assertStatus(200)
            ->assertViewIs('todo_top');
    }

    // 未ログイン時にアプリ投稿(posts_app)へアクセスしてもログイン画面にリダイレクト
    public function testGuestPostApplications()
    {
        $response = $this->get(route('posts.app'));

        $response->assertRedirect(route('login'));
    }
}
