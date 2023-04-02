<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculationTest extends TestCase
{
   
    public function test_calculation_12_term_fix(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 10000,
            'term' => 12,
        ]);

        $response->assertContent('{"status":1,"error":null,"fee":"200.00"}');
    }

    public function test_calculation_24_term_fix(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 10000,
            'term' => 24,
        ]);

        $response->assertContent('{"status":1,"error":null,"fee":"400.00"}');
    }

    public function test_calculation_12_term_interpolation(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 10500,
            'term' => 12,
        ]);

        $response->assertContent('{"status":1,"error":null,"fee":"210.00"}');
    }

    public function test_calculation_24_term_interpolation(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 10500,
            'term' => 24,
        ]);

        $response->assertContent('{"status":1,"error":null,"fee":"420.00"}');
    }

    public function test_calculation_12_low_amount_fail(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 900,
            'term' => 12,
        ]);

        $response->assertContent('{"status":0,"error":"Invalid application","fee":"0.00"}');
    }

    public function test_calculation_24_low_amount_fail(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 900,
            'term' => 24,
        ]);

        $response->assertContent('{"status":0,"error":"Invalid application","fee":"0.00"}');
    }

    public function test_calculation_12_top_amount_fail(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 21000,
            'term' => 12,
        ]);

        $response->assertContent('{"status":0,"error":"Invalid application","fee":"0.00"}');
    }

    public function test_calculation_24_top_amount_fail(): void
    {
        $response = $this->post('/calculation',[
            'amount' => 20001,
            'term' => 24,
        ]);
        
        $response->assertContent('{"status":0,"error":"Invalid application","fee":"0.00"}');
    }
}
