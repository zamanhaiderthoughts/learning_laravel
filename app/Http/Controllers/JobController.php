<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Employer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Job;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer')->paginate(10);
        return Inertia::render('Job/Index',
        [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employers = Employer::all();
        return Inertia::render('Job/Create',
        [
            'employers' => $employers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        Job::create($request->validated());
        return redirect()->route('jobs')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return Inertia::render('Job/Show',
        [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return Inertia::render('Job/Edit',
        [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobRequest $request, Job $job)
    {

        $job->update($request->validated());

        return redirect()->route('jobs')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
            $job->delete();

            return redirect()->route('jobs')->with('success', 'Job deleted successfully.');
    }
}
