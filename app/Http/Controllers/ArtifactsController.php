<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projects;
use App\Models\Artifacts;
use App\Models\User;
use App\Models\LifeSettings;
use App\Models\NonFunctionalRequirements;

class ArtifactsController extends Controller
{

    public $mapUrl = array();

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
        return view('dashboard.storytellings.projectsList', ['projects' => $projects]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTaxonomies()
    {
        $value = array();
        // $mapUrl = array();
        $value["name"] = "AAL";
        $value["children"] = array();
        $value["children"] = $this::getChildren(0);
        // $requirements = NonFunctionalRequirements::where('characteristics_id', "=", "0")->get();
        // foreach($requirements as $key => $requirement) {
        //     $value["children"][$key]["name"] = $requirement->name;
        //     $value["children"][$key]["children"] = array();

        //     $childrens = NonFunctionalRequirements::where('characteristics_id', "=", $requirement->id)->get();
        //     foreach($childrens as $i => $children) {
        //         $value["children"][$key]["children"][$i]["name"] = $children->name;
        //         $value["children"][$key]["children"][$i]["url"] = "http://127.0.0.1:8000/nonFunctionalRequirements/" . $children->id;
        //     }
        // }

        $data = json_encode($value);
        //   var_dump($this->mapUrl); exit;
        // $artifacts = Artifacts::with('user')->with('lifeSettingsSubcatetory')->where('artifacts_type_id', '=', 1)->paginate( 20 );
        return view('dashboard.artifacts.taxonomiesList', ['urlMap' => json_encode($this->mapUrl), "data" => $data]);
    }

    
    private function getChildren($id) {
        $requirements = NonFunctionalRequirements::where('characteristics_id', "=", $id)->get();
        $value = array();
        foreach($requirements as $i => $requirement) {
            $value[$i]["name"] = $requirement->name;
            $this->mapUrl[$requirement->name] = "nonFunctionalRequirements/" . $requirement->id;
            $value[$i]["path_url"] = "nonFunctionalRequirements/" . $requirement->id;
            $value[$i]["children"] = $this::getChildren($requirement->id);        
        }
        return $value;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStorytellings()
    {
        $artifacts = Artifacts::with('user')->with('lifeSettingsSubcatetory')->where('artifacts_type_id', '=', 1)->paginate( 20 );
        return view('dashboard.artifacts.storytellingsList', ['artifacts' => $artifacts]);
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
        $artifact = Artifacts::with('user')->with('lifeSettingsSubcatetory')->find($id);
        return view('dashboard.artifacts.artifactsShow', [ 'artifact' => $artifact ]);
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
        $subdomains = LifeSettings::all();
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
