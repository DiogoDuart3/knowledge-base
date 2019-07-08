<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Auth::loginUsingId(1);
        $nmr = random_int(10,99);

        $response = $this->json('POST', '/admin/manage-users', [
            'name' => 'unitTest'.$nmr,
            'email' => 'user'.$nmr.'@user.com',
            'password' => '12345678',
            'confirm_password' => '12345678',
            'role_id' => '1'
        ]);

        $response->assertRedirect('/admin/manage-users');
    }
}
