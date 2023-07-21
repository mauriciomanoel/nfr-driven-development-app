<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LegalAndNormativeRequirements;
use App\Models\Stakeholders;
use App\Models\StakeholderExperiencies;
use App\Models\NonFunctionalRequirements;
use App\Models\NonFunctionalRequirementsForSpecification;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        
        $valueTreinamento = storage_path() . "/python/treinamento.txt";
        $valueText = storage_path() . "/python/texto.txt";

        $command = "python " . storage_path() . "/python/classification_of_non_functional_requirements_1.3.py " . $valueTreinamento . " " . $valueText;
        $process = Process::fromShellCommandline($command);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $values = explode("|", str_replace("\n", "", $process->getOutput()));  
        $nonFunctionalRequirementsFromExternal = explode(";", $values[1]);
        $nonFunctionalRequirementsFromExternal[] = "Acceptability";
        $nonFunctionalRequirementsFromExternal[] = "Ethics";

        $recommendationsNonFunctionalRequirements = NonFunctionalRequirements::whereIn('name', $nonFunctionalRequirementsFromExternal)->get();
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

        $nonFunctionalRequirements = NonFunctionalRequirementsForSpecification::with('nonFunctionalRequirement')->get();
        return view('dashboard.framework.framework-step05', ['nonFunctionalRequirements' => $nonFunctionalRequirements]);
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

        $recommendationsNonFunctionalRequirements = $request["recommendationsNonFunctionalRequirements"];
        $allNonFunctionalRequirements = $request["nonFunctionalRequirements"];

        NonFunctionalRequirementsForSpecification::where('project_id', '=', '1')->delete();

        foreach($recommendationsNonFunctionalRequirements as $recommendationNonFunctionalRequirement) {                
            $nfrForSpecification = new NonFunctionalRequirementsForSpecification;
            $nfrForSpecification->project_id = 1;
            $nfrForSpecification->users_id = 1;
            $nfrForSpecification->is_recommendation = 1;
            $nfrForSpecification->nfr_id = $recommendationNonFunctionalRequirement;
            $nfrForSpecification->legal_requirements_id="1,2,3";
            $nfrForSpecification->description = "";
            $nfrForSpecification->acceptance_criteria = "";
            $nfrForSpecification->evaluation_metrics = "";
            $nfrForSpecification->content = "";
            $nfrForSpecification->image = "";
            $nfrForSpecification->save();
        }

        if (!empty($allNonFunctionalRequirements)) {
            foreach($allNonFunctionalRequirements as $nonFunctionalRequirement) {                
                $nfrForSpecification = new NonFunctionalRequirementsForSpecification;
                $nfrForSpecification->project_id = 1;
                $nfrForSpecification->users_id = 1;
                $nfrForSpecification->is_recommendation = 0;
                $nfrForSpecification->nfr_id = $nonFunctionalRequirement;
                $nfrForSpecification->legal_requirements_id="1,2,3";
                $nfrForSpecification->description = "";
                $nfrForSpecification->acceptance_criteria = "";
                $nfrForSpecification->evaluation_metrics = "";
                $nfrForSpecification->content = "";
                $nfrForSpecification->image = "";
                $nfrForSpecification->save();
            }
        }

        return redirect()->action([FrameworkController::class, 'step5']);
    }
}
