<?php

namespace Tests\Unit;

use App\Models\LoanApplicationModel;
use App\Repositories\FeeBreakpointRepository;
use App\Traits\CalculateFee;
use PHPUnit\Framework\TestCase;

class CalculationClassTest extends TestCase
{
    public function test_calculation_min_amount_trait(): void
    {
        $application = new LoanApplicationModel(12, 1000);
        $feeObject   = $this->getObjectForTrait(CalculateFee::class);
        $fee         = $feeObject->calculate($application, new FeeBreakpointRepository());

        $application2 = new LoanApplicationModel(24, 1000);
        $feeObject2   = $this->getObjectForTrait(CalculateFee::class);
        $fee2         = $feeObject2->calculate($application2, new FeeBreakpointRepository());

        $this->assertSame($fee, 50.00);
        $this->assertSame($fee2, 70.00);
    }

    public function test_calculation_max_amount_trait(): void
    {
        $application = new LoanApplicationModel(12, 20000);
        $feeObject   = $this->getObjectForTrait(CalculateFee::class);
        $fee         = $feeObject->calculate($application, new FeeBreakpointRepository());

        $application2 = new LoanApplicationModel(24, 20000);
        $feeObject2   = $this->getObjectForTrait(CalculateFee::class);
        $fee2         = $feeObject2->calculate($application2, new FeeBreakpointRepository());

        $this->assertSame($fee, 400.00);
        $this->assertSame($fee2, 800.00);
    }

    public function test_invalid_loan_application(): void
    {
        $application = new LoanApplicationModel(13, 20000);
        
        $this->assertSame(false, $application->isValid());
    }
}
