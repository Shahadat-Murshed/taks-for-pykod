<?php

namespace App\Http\Controllers\Project;

use App\Enums\Project\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Models\Project\Project;
use App\Models\User;
use App\Traits\File\HasFile;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use HasFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('Hello');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->where('role', '!=', 'admin')->get();
        $statuses = Status::array();
        return view('pages.projects.create', compact('users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($validatedData['staff']);

        if (isset($validatedData['file'])) {
            $file = $this->saveFile(
                prefix: 'projects',
                name: $validatedData['name'],
                file: $validatedData['file'],
                custom: null,
                other: time(),
                directory: 'projects',
            );

            $validatedData = [...$validatedData, 'file' => $file];
        }

        $project = Project::create([...$validatedData, 'created_by' => auth()->id()]);
        $project->users()->attach($user->id, ['assigned_by' => auth()->id()]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
