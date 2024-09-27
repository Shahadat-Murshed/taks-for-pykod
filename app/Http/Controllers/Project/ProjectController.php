<?php

namespace App\Http\Controllers\Project;

use App\Enums\Project\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Models\Project\Project;
use App\Models\User;
use App\Traits\File\HasFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    use HasFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = Auth::user()->role;
        $projects = Project::with('users:id,name')
            ->when($userRole === "admin", function ($query) {
                return $query;
            }, function ($query) {
                return $query->whereHas('users', function ($subquery) {
                    $subquery->where('users.id', Auth::id());
                });
            })
            ->orderByDesc('id')
            ->get();

        return view('pages.projects.index', compact('projects'));
    }
    public function deletedList()
    {
        $userRole = Auth::user()->role;
        $projects = Project::onlyTrashed()->with('users:id,name')
            ->when($userRole === "admin", function ($query) {
                return $query;
            }, function ($query) {
                return $query->whereHas('users', function ($subquery) {
                    $subquery->where('users.id', Auth::id());
                });
            })
            ->orderByDesc('id')
            ->get();

        return view('pages.projects.recycle', compact('projects'));
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

        notyf()->success('Project Created Successfully');
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

    public function restore(string $id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Project restored successfully!',
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Project deleted successfully!',
            ],
            Response::HTTP_OK
        );
    }
}
