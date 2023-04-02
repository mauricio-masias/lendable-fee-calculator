<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ApplicantModel;
use App\Models\LoanApplicationModel;

class LoanApplicationController extends Controller
{
    /**
    *  Display Loan form.
    *  @return \Illuminate\Http\View
    */
    public function index(): View
    {
        return view('loanApplication.index');
    }
    
}
