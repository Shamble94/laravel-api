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
        $car = Car::with(["type", "technology"])->find($id);

        if (!$car) {
            return response()->json(['error' => 'Auto non trovata'], 404);
        }

        return response()->json([
            'success' => true,
            'car' => $car
        ]);
    }
}
