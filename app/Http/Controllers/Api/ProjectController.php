<?php

namespace App\Http\Controllers\Api;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(["type", "technology"])->paginate(4);
        
        return response()->json([
            "success"  => true,
            "results"  => $projects
        ]);
    }

    public function show($id)
    {
        $projects = Project::with(["type", "technology"])->find($id);
        if (!$projects) {
            return response()->json(['error' => 'Progetto non trovata'], 404);
        }

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
