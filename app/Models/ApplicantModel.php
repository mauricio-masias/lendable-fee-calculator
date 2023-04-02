<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\FeeCalculatorInterface;
use App\Traits\CalculateFee;

class ApplicantModel extends Model implements FeeCalculatorInterface
{
    use CalculateFee;
}
