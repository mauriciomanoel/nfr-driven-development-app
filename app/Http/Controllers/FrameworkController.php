<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\LegalRequirements;
use App\Models\Stakeholders;
use App\Models\StakeholderExperiencies;
use App\Models\NonFunctionalRequirements;
use App\Models\StepsFrameworkProject;
use App\Models\NonFunctionalRequirementsForSpecification;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use File;
use Session;
use Illuminate\Support\Facades\Config;


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


        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();
        return view('dashboard.framework.index', ['stepsFrameworkProject' => $stepsFrameworkProject]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step1()
    {
        
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();
        $this::setActiveStatusStep(1);
        $legalRequirements = LegalRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step01', ['legalRequirements' => $legalRequirements, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2()
    {
        
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $stakeholders = Stakeholders::with('analysis')->paginate( 20 );
        return view('dashboard.framework.framework-step02', ['stakeholders' => $stakeholders, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3()
    {
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();
        
        $legalRequirements = LegalRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step03', ['legalRequirements' => $legalRequirements, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }

             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3_2()
    {
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $stakeholderExperiencies = StakeholderExperiencies::with('stakeholders')->paginate( 20 );
        return view('dashboard.framework.framework-step03_2', ['stakeholderExperiencies' => $stakeholderExperiencies, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step4()
    {
        
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

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
        return view('dashboard.framework.framework-step04', ['nonFunctionalRequirements' => $nonFunctionalRequirements, 'recommendationsNonFunctionalRequirements' => $recommendationsNonFunctionalRequirements, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step5()
    {

        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $nonFunctionalRequirementsForSpecification = NonFunctionalRequirementsForSpecification::with('nonFunctionalRequirement')->get();
        $arrayContent = array();
        foreach($nonFunctionalRequirementsForSpecification as $nonFunctionalRequirementForSpecification) {
            $arrayContent[] = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement->content;
        }
       
        // $this::mergeSigs($arrayContent);
        return view('dashboard.framework.framework-step05', ['nonFunctionalRequirements' => $nonFunctionalRequirementsForSpecification, 'stepsFrameworkProject' => $stepsFrameworkProject]);
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
    public function step1ConfirmLegalRequirement(Request $request)
    {

        $this::setCompleteStatusStep(1);
        return redirect()->action([FrameworkController::class, 'step2']);
        
        // var_dump($request["legalRequirements"]); exit;
        // $recommendationsNonFunctionalRequirements = $request["recommendationsNonFunctionalRequirements"];
        // $allNonFunctionalRequirements = $request["nonFunctionalRequirements"];

        // NonFunctionalRequirementsForSpecification::where('project_id', '=', '1')->delete();

        // foreach($recommendationsNonFunctionalRequirements as $recommendationNonFunctionalRequirement) {                
        //     $nfrForSpecification = new NonFunctionalRequirementsForSpecification;
        //     $nfrForSpecification->project_id = 1;
        //     $nfrForSpecification->users_id = 1;
        //     $nfrForSpecification->is_recommendation = 1;
        //     $nfrForSpecification->nfr_id = $recommendationNonFunctionalRequirement;
        //     $nfrForSpecification->legal_requirements_id="1,2,3";
        //     $nfrForSpecification->description = "";
        //     $nfrForSpecification->acceptance_criteria = "";
        //     $nfrForSpecification->evaluation_metrics = "";
        //     $nfrForSpecification->content = "";
        //     $nfrForSpecification->image = "";
        //     $nfrForSpecification->save();
        // }

        // if (!empty($allNonFunctionalRequirements)) {
        //     foreach($allNonFunctionalRequirements as $nonFunctionalRequirement) {                
        //         $nfrForSpecification = new NonFunctionalRequirementsForSpecification;
        //         $nfrForSpecification->project_id = 1;
        //         $nfrForSpecification->users_id = 1;
        //         $nfrForSpecification->is_recommendation = 0;
        //         $nfrForSpecification->nfr_id = $nonFunctionalRequirement;
        //         $nfrForSpecification->legal_requirements_id="1,2,3";
        //         $nfrForSpecification->description = "";
        //         $nfrForSpecification->acceptance_criteria = "";
        //         $nfrForSpecification->evaluation_metrics = "";
        //         $nfrForSpecification->content = "";
        //         $nfrForSpecification->image = "";
        //         $nfrForSpecification->save();
        //     }
        // }

        // return redirect()->action([FrameworkController::class, 'step5']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2ConfirmIdentifyAndAnalyzeStakeholders(Request $request)
    {
        $this::setCompleteStatusStep(2);
        return redirect()->action([FrameworkController::class, 'step3']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3SelectDataCollectionTechniques(Request $request)
    {
        $this::setCompleteStatusStep(3);
        return redirect()->action([FrameworkController::class, 'step3_2']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3CollectStakeholderExperience(Request $request)
    {
        $this::setCompleteStatusStep(4);
        return redirect()->action([FrameworkController::class, 'step4']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step4ConfirmNonFunctionalRequirements(Request $request)
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

        $this::setCompleteStatusStep(5);
        return redirect()->action([FrameworkController::class, 'step5']);
    }

    public function downloadAllSIG() {

        $nonFunctionalRequirementsForSpecification = NonFunctionalRequirementsForSpecification::with('nonFunctionalRequirement')->get();
        $arrayContent = array();
        foreach($nonFunctionalRequirementsForSpecification as $nonFunctionalRequirementForSpecification) {
            $nonFunctionalRequirement = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement;
            $legalRequirements = $nonFunctionalRequirement->legalRequirements;
            $legalRequirementsName = array();
            foreach($legalRequirements as $legalRequirement) {
                $legalRequirementsName[] = $legalRequirement->name;
            }
            if (empty($nonFunctionalRequirement->content)) continue;

            // var_dump($nonFunctionalRequirement->name);
            $element = json_decode($nonFunctionalRequirement->content, true);
            $element["orphans"][0]["customProperties"]["Description"] = trim($nonFunctionalRequirement->description);
            $element["orphans"][0]["customProperties"]["name"] = trim($nonFunctionalRequirement->name);
            $element["orphans"][0]["customProperties"]["recommendations"] = trim($nonFunctionalRequirement->recommendations);
            $element["orphans"][0]["customProperties"]["legalRequirements"] = implode(";", $legalRequirementsName);
            $arrayContent[] = $element;
        }

        exit;
        $data = $this::mergeSigs($arrayContent);

        $headers = ['Content-Type: application/json'];
        $fileName = "sig-file.txt";
        $fileStorePath = public_path('/tmp/'.$fileName);
        File::put($fileStorePath, $data);

        return response()->download($fileStorePath, $fileName, $headers);

        
    }

    public function mergeSigs($arrayContent) {
        
        $firstArray = array_shift($arrayContent);
        
        $maxValueX = $this::getMaxValueFromArray($firstArray["orphans"]);
        
        $replaceIds = array();
        foreach($arrayContent as $element) {
            if (empty($element)) continue;
            
            // $element = json_decode($value, true);                
            foreach($element["orphans"] as $key => $orphan) {
                $element["orphans"][$key]["x"] += $maxValueX;
                $replaceIds[] = $orphan["id"];
            }

            $tempElement = json_encode($element);
            // replace Ids
            foreach($replaceIds as $id) {
                $tempElement = str_replace($id, Str::uuid()->toString(), $tempElement);
            }

            $element = json_decode($tempElement, true);
            $firstArray["orphans"] = array_merge($firstArray["orphans"], $element["orphans"]);
            $firstArray["links"] = array_merge($firstArray["links"], $element["links"]);
            $firstArray["display"] = array_merge($firstArray["display"], $element["display"]);

            $maxValueX = $this::getMaxValueFromArray($firstArray["orphans"]);
        }
        
        $firstArray["diagram"]["customProperties"]["Description"] = "Generation by NDD Framework";
        $firstArray["saveDate"] = gmdate("M d Y H:i:s");
        $firstArray["diagram"]["name"] = "New SIG";
        $firstArray["diagram"]["width"] = $maxValueX + 200;

        return json_encode($firstArray);
    }

    private function getMaxValueFromArray($elements) {

        $maxValueX = 0;
        foreach($elements as $orphan) {
            if ($maxValueX < $orphan["x"]) $maxValueX = $orphan["x"];
        }

        return $maxValueX;
    }

    private function setActiveStatusStep($currentStep) {

        $project = Session::get('currentProject');

        $nextStep = StepsFrameworkProject::where("project_id", "=", $project->id)
                                ->where("steps_framework_id", "=", $currentStep+1)->first();

        if ($nextStep->status == Config::get('constants.frameworkStates.disabled')) {

            $stepsFrameworkProject = StepsFrameworkProject::where("project_id", "=", $project->id)
                                    ->where("steps_framework_id", "=", $currentStep)->first();
                                
            $stepsFrameworkProject->status = Config::get('constants.frameworkStates.active');
            $stepsFrameworkProject->save();
        }
    }

    private function setCompleteStatusStep($currentStep) {

        $project = Session::get('currentProject');

        $nextStep = StepsFrameworkProject::where("project_id", "=", $project->id)
                                ->where("steps_framework_id", "=", $currentStep+1)->first();

        if ($nextStep->status == Config::get('constants.frameworkStates.disabled')) {

            $stepsFrameworkProject = StepsFrameworkProject::where("project_id", "=", $project->id)
                                    ->where("steps_framework_id", "=", $currentStep)->first();
                                
            $stepsFrameworkProject->status = Config::get('constants.frameworkStates.complete');
            $stepsFrameworkProject->save();

            $nextStep->status = Config::get('constants.frameworkStates.active');
            $nextStep->save();
        }
    }
}
