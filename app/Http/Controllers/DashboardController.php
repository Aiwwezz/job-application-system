<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $totalApplicants = Applicant::count();
        $totalDepartments = Department::count();

        $pendingApplicants = Applicant::where('status', 'pending')->count();
        $reviewedApplicants = Applicant::where('status', 'reviewed')->count();
        $acceptedApplicants = Applicant::where('status', 'accepted')->count();
        $rejectedApplicants = Applicant::where('status', 'rejected')->count();

        $recentApplicants = Applicant::with('department')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'totalApplicants' => $totalApplicants,
            'totalDepartments' => $totalDepartments,
            'pendingApplicants' => $pendingApplicants,
            'reviewedApplicants' => $reviewedApplicants,
            'acceptedApplicants' => $acceptedApplicants,
            'rejectedApplicants' => $rejectedApplicants,
            'recentApplicants' => $recentApplicants,
        ]);
    }
}
