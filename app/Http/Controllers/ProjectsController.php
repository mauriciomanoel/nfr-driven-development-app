<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projects;
use App\Models\LifeSettings;
use App\Models\LifeSettingsCategories;
use App\Models\LifeSettingsSubcategories;
use Session;

class ProjectsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::with('user')->with('lifeSettings')->paginate( 20 );
        return view('dashboard.projects.projectsList', ['projects' => $projects]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function current(Request $request)
    {

        $validatedData = $request->validate([
            'current_project'     => 'required',
        ]);

        $projectId = $request->input("current_project");
        $this->setCurrentProject($projectId);
        
        $request->session()->flash('message', 'Current Project successfully updated');
        return back()->withInput();
    }

    private function setCurrentProject($projectId) {
        $user = auth()->user();
        Projects::where('users_id',$user->id)->update(['current'=>0]);
        $project = Projects::where('users_id',$user->id)->where('id',$projectId)->first();
        Session::put('currentProject', $project);

        $project->current = 1;
        $project->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lifeSettings = LifeSettings::all();
        $lifeSettingsCategories = LifeSettingsCategories::all();
        $lifeSettingsSubcategories = LifeSettingsSubcategories::all();

         return view('dashboard.projects.create', [ 'lifeSettings' => $lifeSettings, 'lifeSettingsCategories' => $lifeSettingsCategories, 'lifeSettingsSubcategories' => $lifeSettingsSubcategories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'description'           => 'required',
            'life_settings'     => 'required',
        ]);


        $user = auth()->user();
        $isCurrentProject = false;
        if (!Projects::where('users_id', '=', $user->id)->exists()) {
           $isCurrentProject = true;
         }

       
        $project = new Projects();
        $project->title     = $request->input('title');
        $project->description   = $request->input('description');
        $project->life_settings_id = $request->input('life_settings');
        $project->life_settings_category_id = $request->input('life_settings_category');
        $project->life_settings_subcategory_id = $request->input('life_settings_subcategory');
        $project->current = 0;

        var_dump($request->input('life_settings_subcategory')); exit;

        $project->users_id = $user->id;
        $project->save();

        if ($isCurrentProject) {
            $this->setCurrentProject($project->id);
        }

        $request->session()->flash('message', 'Successfully created project');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::with('user')->with('lifeSettings')->find($id);
        return view('dashboard.projects.projectShow', [ 'project' => $project ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::find($id);
        $lifeSettings = LifeSettings::all();
        $lifeSettingsCategories = LifeSettingsCategories::all();
        $lifeSettingsSubcategories = LifeSettingsSubcategories::all();
        return view('dashboard.projects.edit', [ 'lifeSettings' => $lifeSettings, 'lifeSettingsCategories' => $lifeSettingsCategories, 'lifeSettingsSubcategories' => $lifeSettingsSubcategories, 'project' => $project ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title'                     => 'required|min:1|max:64',
            'description'               => 'required',
            'life_settings_category'    => 'required',
            'life_settings_subcategory' => 'required',
        ]);
        $project = Projects::find($id);
        $project->title         = $request->input('title');
        $project->description   = $request->input('description');
        $project->life_settings_category_id = $request->input('life_settings_category');
        $project->life_settings_subcategory_id = $request->input('life_settings_subcategory');
        $project->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->route('projects.index');
    }
}
