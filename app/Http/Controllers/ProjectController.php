<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        //importo anche il modello della technology
        $technologies = Technology::all();

        return view('pages.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request);

        //VALIDAZIONE
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $val_data['slug'] = $slug;

        // dd($val_data);


        //gestione immagine

        if ($request->hasFile('img')) {
            $path = Storage::disk('public')->put('images_folder', $request->img);
            // images_folder è il parametro che definisce il nome della cartella delle imgs

            $val_data['img'] = $path;
        }

        //funzione per creare il nuovo projetto e va a sostituire il newpost etc 
        $new_project = Project::create($val_data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }

        return redirect()->route('dashboardprojects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        //importo anche il modello della technology
        $technologies = Technology::all();

        return view('pages.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $val_data['slug'] = $slug;

        if ($request->hasFile('img')) {
            if ($project->img) {
                Storage::delete($project->img);
            }

            $path = Storage::disk('public')->put('images_folder', $request->img);

            $val_data['img'] = $path;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('dashboardprojects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);


        if ($project->img) {
            Storage::delete($project->img);
        }

        $project->delete();

        return redirect()->route('dashboardprojects.index');
    }
}
