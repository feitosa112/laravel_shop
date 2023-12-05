<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServeTest extends TestCase
{

    public function it_runs_your_command_successfully()
    {
        $this->artisan('serve')
             ->expectsOutput('Expected output')
             ->assertExitCode(0);
    }
}
