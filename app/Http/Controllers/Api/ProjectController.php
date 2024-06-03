<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies','type')->get();
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::with('type', 'technologies')->where('id', $id)->first();

        if($project){
            return response()->json([
                'success' => true,
                'response' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => '404 - Nothing found.',
            ]);
        }
    }
}
