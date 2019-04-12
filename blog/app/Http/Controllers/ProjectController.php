<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
class ProjectController extends Controller
{
    //
    
    public function index(){
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }
    

    public function create(){
        return view('projects.create_project');
    }
   

    public function store(Project $project){
        // $project = new \App\Project;
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        $validated = request()->validate([
            'title'=>['required','min:6','max:255'], 
            'description'=>['required','min:6','max:255']
        ]);

        // Project::create(request(['title','description']));
        Project::create($validated);

        return redirect("/projects");

    }
   

    public function edit(Project $project){
        // $project = Project::findorfail($id);

        return view('projects.edit',compact('project'));
    }

    public function update(Project $project){
        // $project = Project::findorfail($id);
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->update();

        $project->update(request(['title','description']));
        return redirect("/projects");

    }
    

    public function show(Project $project){
        // $project = Project::findorfail($id);
        dd($project->id);

        return view('projects.display',compact('project'));
    }
   

    public function destroy(Project $project)
    {
        // Project::findorfail($id)->delete();
        $project->delete();
        return redirect("/projects");
    }
}
