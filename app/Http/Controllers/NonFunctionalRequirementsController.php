<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LegalAndNormativeRequirements;
use App\Models\Projects;
use App\Models\LifeSettings;
use App\Models\LifeSettingsCategories;
use App\Models\LifeSettingsSubcategories;
use App\Models\NonFunctionalRequirements;
use File;



class NonFunctionalRequirementsController extends Controller
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
        $requirements = NonFunctionalRequirements::with('user')->paginate( 20 );
        return view('dashboard.nonFunctionalRequirements.nonFunctionalRequirementsList', ['requirements' => $requirements]);
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

        $legalAndNormativeRequirements = LegalAndNormativeRequirements::whereIn('id', [1, 2, 3])->get();
        $nonFunctionalRequirement = NonFunctionalRequirements::with('user')->find($id);
        return view('dashboard.nonFunctionalRequirements.show', ['nonFunctionalRequirement' => $nonFunctionalRequirement, 'legalAndNormativeRequirements' => $legalAndNormativeRequirements  ]);
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
        return view('dashboard.projects.edit', [ 'lifeSettings' => $lifeSettings, 'lifeSettingsCategories' => $lifeSettingsCategories, "lifeSettingsSubcategories" => $lifeSettingsSubcategories, 'project' => $project ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadSIG($id)
    {
        $nonFunctionalRequirement = NonFunctionalRequirements::find($id);

        $data = $nonFunctionalRequirement->content;
        $headers = ['Content-Type: application/json'];
        $fileName = "sig-$nonFunctionalRequirement->name-file.txt";
        $fileStorePath = public_path('/tmp/'.$fileName);
        File::put($fileStorePath, $data);
        return response()->download($fileStorePath, $fileName, $headers);
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
