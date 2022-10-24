<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_log_user_request()
    {
        $response = $this->get('/api/user/log');

        $response->assertStatus(200);
    }

    public function test_log_user_command()
    {
        $this->artisan('user:log')->assertExitCode(0);
    }
}
