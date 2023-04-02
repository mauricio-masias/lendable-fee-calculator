<?php

namespace Tests\Unit;

use App\Repositories\FeeBreakpointRepository;
use PHPUnit\Framework\TestCase;

class FeeBreakpointRepositoryTest extends TestCase
{
    public function test_fee_breakpoint_repository(): void
    {
        $breakPoints = (new FeeBreakpointRepository())->getBreakpoints();
        $totalTerms  = count($breakPoints);

        $this->assertSame($totalTerms, 2);
        $this->assertTrue(is_array($breakPoints[12]));
        $this->assertTrue(is_array($breakPoints[24]));
        $this->assertSame($breakPoints[12][1000], 50);
        $this->assertSame($breakPoints[12][20000], 400);
        $this->assertSame($breakPoints[24][1000], 70);
        $this->assertSame($breakPoints[24][20000], 800);
    }
}
