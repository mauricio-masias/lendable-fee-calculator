<?php

declare (strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\FeeBreakpointRepository;
use App\Models\ApplicantModel;
use App\Models\LoanApplicationModel;
use Illuminate\Http\Request;

class FeeCalculationController extends Controller
{
    public function index(Request $request, FeeBreakpointRepository $feeRepo): JsonResponse
    {
        $amount = (float) $request->input('amount');
        $term   = (int) $request->input('term');

        $application = new LoanApplicationModel($term, $amount);

        if (!$application->isValid()) {
            return $this->response(0, 0);
        }

        $fee = (new ApplicantModel)->calculate($application, $feeRepo);
        
        return $this->response($fee, 1);
    }

    private function response(float $fee, int $status): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'error'  => $status === 0 ? 'Invalid application' : null,
            'fee'    => number_format((float) $fee, 2, '.', ''),
        ], 200);
    }
}
