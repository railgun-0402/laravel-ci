<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class ArticleCOntrollerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex() 
    {
        $response = $this->get(route('articles.index'));

        $response->assertStatus(200)
        ->assertViewIs('articles.index');
    }

    public function testGuestCreate()
    {
        // 記事投稿のURLが返る
        $response = $this->get(route('articles.create'));
        // リダイレクトされたかどうか
        $response->assertRedirect(route('login'));
    }

    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        // actingAsメソッドは、引数として渡したUserモデルにてログインした状態を作り出す
        $response = $this->actingAs($user)
        ->get((route('articles.create')));

        $response->assertStatus(200)
            ->assertViewIs('articles.create');
    }
}