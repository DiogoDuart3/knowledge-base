<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Auth::loginUsingId(1);

        $response = $this->json('POST', '/categories', [
            'name' => 'unitTest',
        ]);

        $response->assertRedirect('/categories');
    }
}
