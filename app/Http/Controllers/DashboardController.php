<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Projects\Project;
use App\Models\Projects\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
    }

    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();

        return view('dashboard', compact('projects', 'tasks'));
    }

    public function createProject(Request $request)
    {

        Project::create([
            'name' => $request->projectName
        ]);

        return redirect(route('dashboard'));
    }

    public function editProject(Request $request)
    {

        return redirect(route('dashboard'));
    }

    public function createTask(Request $request)
    {
        Task::create([
            'name'          => $request->taskName,
            'priority'      => $request->taskPriority,
            'project_id'    => $request->project
        ]);

        return redirect(route('dashboard'));
    }

    public function editTask(Request $request)
    {

        return redirect(route('dashboard'));
    }
}
