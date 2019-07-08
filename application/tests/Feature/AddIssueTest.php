<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddIssueTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Auth::loginUsingId(1);

        $response = $this->json('POST', '/issue', [
            'subject' => 'testSubject',
            'description' => '<p>Test description</p>',
            'issue_solution' => '<p>Test solution</p>',
            'category_id' => '1',
            'tags' => ['1']
        ]);

        $response->assertRedirect('/');
    }
}
