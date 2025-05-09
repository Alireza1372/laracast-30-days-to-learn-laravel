<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }



    public function edit(Job $job)
    {

        if (Auth::guest()) {
            return redirect('/login');
        }

        Gate::authorize('edit-job', $job); //allows denies

        return view('jobs.edit', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:10', 'max:255'],
            'salary' => ['required', 'min:10', 'max:255'],
        ]);

        Job::create([
            'title' => Request()->title,
            'salary' => Request()->salary,
            'employer_id' => Auth::user()->id,
        ]);

        return redirect('/jobs');
    }
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:10', 'max:255'],
            'salary' => ['required', 'min:10', 'max:255'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
