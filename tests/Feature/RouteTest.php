<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
   
    public function test_input_form_route(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_calculation_route(): void
    {
        $response = $this->post('/calculation');
        $response->assertStatus(200);
    }
}
