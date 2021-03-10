<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PostApp;
use App\Models\User;

class PostAppTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $postApp = factory(PostApp::class)->create();

        $result = $postApp->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $postApp = factory(PostApp::class)->create();
        $user = factory(User::class)->create();
        $postApp->likes()->attach($user);

        $result = $postApp->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $postApp = factory(PostApp::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $postApp->likes()->attach($another);

        $result = $postApp->isLikedBy($user);

        $this->assertFalse($result);
    }
}
