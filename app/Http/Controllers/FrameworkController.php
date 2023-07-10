<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LegalAndNormativeRequirements;
use App\Models\Stakeholders;
use App\Models\StakeholderExperiencies;
use App\Models\NonFunctionalRequirements;
use App\Models\NonFunctionalRequirementsForSpecification;

use Session;

class FrameworkController extends Controller
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
        return view('dashboard.framework.index');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step1()
    {
        $legalAndNormativeRequirements = LegalAndNormativeRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step01', ['legalAndNormativeRequirements' => $legalAndNormativeRequirements]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2()
    {
        $stakeholders = Stakeholders::with('analysis')->paginate( 20 );
        return view('dashboard.framework.framework-step02', ['stakeholders' => $stakeholders]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3()
    {
        $legalAndNormativeRequirements = LegalAndNormativeRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step03', ['legalAndNormativeRequirements' => $legalAndNormativeRequirements]);
    }

             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3_2()
    {
        $stakeholderExperiencies = StakeholderExperiencies::with('stakeholders')->paginate( 20 );
        return view('dashboard.framework.framework-step03_2', ['stakeholderExperiencies' => $stakeholderExperiencies]);
    }
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step4()
    {
        
        $recommendationsNonFunctionalRequirements = NonFunctionalRequirements::whereIn('name', ["Comfort", "Usability", "Learnability", "Accessibility"])->get();

        $nonFunctionalRequirements = NonFunctionalRequirements::with('user')->get();
        return view('dashboard.framework.framework-step04', ['nonFunctionalRequirements' => $nonFunctionalRequirements, 'recommendationsNonFunctionalRequirements' => $recommendationsNonFunctionalRequirements]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step5()
    {
        $legalAndNormativeRequirements = LegalAndNormativeRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step05', ['legalAndNormativeRequirements' => $legalAndNormativeRequirements]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stakeholders($id)
    {
        $stakeholder = Stakeholders::with('analysis')->find($id);
        return view('dashboard.framework.stakeholders-show', ['stakeholder' => $stakeholder]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stakeholdersExperiencies($id)
    {
        $stakeholderExperience = StakeholderExperiencies::with('stakeholders')->find($id);
        return view('dashboard.framework.stakeholders-experience-show', ['stakeholderExperience' => $stakeholderExperience]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmNonFunctionalRequirements(Request $request)
    {

        var_dump($request["recommendationsNonFunctionalRequirements"]); 
        var_dump($request["nonFunctionalRequirements"]); 


        $flight = new NonFunctionalRequirementsForSpecification;
 
        $flight->project_id = 1;
        $flight->users_id = 1;
        $flight->nfr_id = 1;
 
        $flight->save();


        //return redirect()->action([FrameworkController::class, 'step5']);
        exit;


        $stakeholderExperience = StakeholderExperiencies::with('stakeholders')->find($id);
        return view('dashboard.framework.stakeholders-experience-show', ['stakeholderExperience' => $stakeholderExperience]);
    }


    
    
}
