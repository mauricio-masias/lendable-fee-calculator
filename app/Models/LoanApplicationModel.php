<?php

declare (strict_types = 1);

namespace App\Models;

class LoanApplicationModel
{
    private int $minAmount     = 1000;
    private int $maxAmount     = 20000;
    private array $termAllowed = [12, 24];

    public function __construct(
        private int $term,
        private float $amount
    ) {
    }

    /**
     * @return int
     * Term (loan duration) for this loan application
     * in number of months.
     */
    public function getTerm(): int
    {
        return $this->term;
    }

    /**
     * @return float
     * Amount requested for this loan application.
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return bool
     * Application validation.
     */
    public function isValid(): bool
    {
        if ($this->amount < $this->minAmount || $this->amount > $this->maxAmount) {
            return false;
        }
        if (!in_array($this->term, $this->termAllowed)) {
            return false;
        }
        if ($this->isDecimal($this->amount)) {
            $this->amount = (float) number_format((float) $this->amount, 2, '.', '');
        }
        return true;
    }


    /**
     * @return bool
     * Amount decimal check.
     */
    private function isDecimal(float $val): bool
    {
        return is_numeric($val) && floor($val) != $val;
    }
}
