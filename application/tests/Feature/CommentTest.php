<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Auth::loginUsingId(1);

        $response = $this->json('POST', '/comment', [
            'issue_id' => '1',
            'body' => 'testComment'
        ]);

        $response->assertRedirect('/issue/1');
    }
}
