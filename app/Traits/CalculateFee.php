<?php

declare (strict_types = 1);

namespace App\Traits;

use App\Models\LoanApplicationModel;
use App\Repositories\FeeBreakpointRepository;

trait CalculateFee
{
    /**
     * @return float The calculated total fee.
     */
    public function calculate(
        LoanApplicationModel $application,
        FeeBreakpointRepository $feeRepo
    ): float {
        $breakpoints = $feeRepo->getBreakpoints();

        $bounds = $breakpoints[$application->getTerm()];
        $amount = $application->getAmount();

        // If direct match is made, return fee
        if (array_key_exists($amount, $bounds)) {
            return $bounds[$amount];
        }

        $fee = $this->getFeeInterpolateLinearly($bounds, $amount);
        return $this->roundFee($fee, 5);
    }

    /**
     * @return float 
     */
    private function getFeeInterpolateLinearly(array $bounds, float $amount): float
    {
        $x1         = 0; // low amount
        $x2         = 0; // top amount
        $y1         = 0; // low fee
        $y2         = 0; // top fee

        foreach ($bounds as $boundAmount => $boundFee) {

            if ($amount < $boundAmount) {
                $x2 = $boundAmount;
                $y2 = $boundFee;
                break;
            }

            $x1 = $boundAmount;
            $y1 = $boundFee;
        }

        // [ Fee = y1 + (y2-y1) * (($amount-x1) / (x2-x1)) ]
        return (float) $y1 + ($y2 - $y1) * (($amount - $x1) / ($x2 - $x1));
    }

    /**
     * @return float Round Fee to N multiple
     */
    private function roundFee(float $fee, int $roundMultiple): float
    {
        return round($fee) % $roundMultiple === 0
        ? round($fee)
        : round(($fee + $roundMultiple / 2) / $roundMultiple) * $roundMultiple;
    }
}
