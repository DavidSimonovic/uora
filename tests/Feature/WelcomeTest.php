<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;


class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_only_registerd_user_can_visit_news()
    {
        $response = $this->get('/news')->assertRedirect('/login');


    }
    public function test_only_registerd_user_can_visit_posts()
    {
        $response = $this->get('/posts')->assertRedirect('/login');


    }
    public function test_only_registerd_user_can_visit_questions()
    {
        $response = $this->get('/question')->assertRedirect('/login');


    }



}
