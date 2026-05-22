<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApplicantController extends Controller
{

    public function print($id)
    {
        $applicant = Applicant::with('department')->findOrFail($id);

        return view('admin.applicants.print', compact('applicant'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('apply', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'department_id' => 'required',
            'resume' => 'nullable|file|mimes:pdf|max:5120',
            'transcript' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $resumeName = null;
        $transcriptName = null;

        if ($request->hasFile('resume')) {

            $resumeName = time() . '_resume_' . uniqid() . '.' .
                $request->resume->extension();

            $request->resume->move(
                public_path('uploads'),
                $resumeName
            );
        }

        if ($request->hasFile('transcript')) {
            $transcriptName = time() . '_transcript_' . uniqid() . '.' .
                $request->transcript->extension();

            $request->transcript->move(
                public_path('uploads'),
                $transcriptName
            );
        }

        Applicant::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'department_id' => $request->department_id,
            'resume' => $resumeName,
            'transcript' => $transcriptName,
        ]);

        return redirect('/apply')
            ->with('success', 'Application submitted successfully.');
    }

    public function index(Request $request)
    {
        $departments = Department::all();

        $query = Applicant::with('department');

        if ($request->department_id) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('fullname', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        $applicants = $query->latest()->paginate(10);

        return view('admin.applicants.index', compact('applicants', 'departments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        $applicant->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        $applicant = Applicant::with('department')->findOrFail($id);

        return view('admin.applicants.show', compact('applicant'));
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);

        if ($applicant->resume && File::exists(public_path('uploads/' . $applicant->resume))) {
            File::delete(public_path('uploads/' . $applicant->resume));
        }

        if ($applicant->transcript && File::exists(public_path('uploads/' . $applicant->transcript))) {
            File::delete(public_path('uploads/' . $applicant->transcript));
        }

        $applicant->delete();

        return redirect()->back();
    }
}
