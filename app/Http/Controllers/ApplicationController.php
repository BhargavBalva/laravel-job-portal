<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        if ($request->filled('job_category')) {
            $query->where('job_category', $request->job_category);
        }

        $applications = $query->paginate(5);

        if ($request->ajax()) {
            return view('application.partials.table', compact('applications'))->render();
        }

        return view('application.index', compact('applications'));
    }


    public function create()
    {
        return view('application.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'job_type' => 'required|string',
            'job_category' => 'required|string',
            'experience' => 'required|integer|min:0',
            'notice_period' => 'required|integer|min:0',
            'job_description' => 'required|string',
        ], [
            'name.required' => 'Name is required.',
            'name.regex' => 'Number in name field is not allowed.',
            'job_type.required' => 'Job type is required.',
            'job_category.required' => 'Job category is required.',
            'experience.required' => 'Experience is required.',
            'notice_period.required' => 'Notice period is required.',
            'job_description.required' => 'Job description is required.',
        ]);

        Application::create($validated);

        return redirect()->route('application.index')->with('success', 'Application submitted successfully!');
    }

    public function edit($id)
    {
        $application = Application::findOrFail($id);

        $jobTypes = ['Fulltime', 'Parttime', 'Consulting', 'Internship'];
        $departments = ['Backend', 'Frontend', 'UI-UX', 'SEO'];

        return view('application.edit', compact('application', 'jobTypes', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_type' => 'required|string',
            'job_category' => 'required|string',
            'experience' => 'required|integer|min:0',
            'notice_period' => 'required|integer|min:0',
            'job_description' => 'required|string',
        ]);

        $application = Application::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('application.index')->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('application.index')->with('success', 'Application deleted successfully.');
    }
}
