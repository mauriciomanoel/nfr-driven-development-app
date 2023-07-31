<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projects;
use App\Models\LifeSettings;
use App\Models\LegalRequirements;
use App\Models\Stakeholders;
use App\Models\StakeholderExperiencies;
use App\Models\NonFunctionalRequirements;
use App\Models\NonFunctionalRequirementsForSpecification;
use Session;

class DashboardController extends Controller
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

        if (is_null(Session::get('currentProject'))) {
            $user = auth()->user();
            $project = Projects::where('users_id',$user->id)->where("current",1)->first();
            Session::put('currentProject', $project);
        }

        $nonFunctionalRequirements = NonFunctionalRequirements::get();
        $nonFunctionalRequirementCount = $nonFunctionalRequirements->count();

        $legalRequirements = LegalRequirements::get();
        $legalAndNormativeRequirementCount = $legalRequirements->count();

        $sigs = NonFunctionalRequirements::whereNotNull('content')->get();
        $sigCount = $sigs->count();
        $projects = Projects::with('user')->with('lifeSettings')->paginate( 20 );
        $countProject = $projects->count();

        $values = array();
        $values["nonFunctionalRequirementCount"] = $nonFunctionalRequirementCount;
        $values["legalAndNormativeRequirementCount"] = $legalAndNormativeRequirementCount;
        $values["sigCount"] = $sigCount;
        $values["countProject"] = $countProject;

        return view('dashboard.homepage', ['projects' => $projects, 'values' => $values]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subdomains = LifeSettings::all();
        return view('dashboard.projects.create', [ 'subdomains' => $subdomains ]);
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
            'content'           => 'required',
            'subdomains_id'     => 'required',
        ]);

        $user = auth()->user();
        $note = new Projects();
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->subdomains_id = $request->input('subdomains_id');
        $note->users_id = $user->id;
        $note->save();
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
        $project = Projects::with('user')->with('subdomain')->find($id);
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
        $subdomains = Subdomains::all();
        return view('dashboard.projects.edit', [ 'subdomains' => $subdomains, 'project' => $project ]);
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
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
        ]);
        $project = Projects::find($id);
        $project->title     = $request->input('title');
        $project->content   = $request->input('content');
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
