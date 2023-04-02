<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\LoanApplicationModel;
use App\Repositories\FeeBreakpointRepository;

interface FeeCalculatorInterface
{
    /**
     * @return float Interface to calculate total fee.
     */
    public function calculate(
    	LoanApplicationModel $application, 
    	FeeBreakpointRepository $feeRepo
    ): float;
}
