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
use App\Models\Steps1Framework;
use App\Models\Steps2Framework;
use App\Models\Steps31Framework;
use App\Models\Steps32Framework;
use App\Models\DataCollectionTechniques;
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
        $this::setActiveStatusStep(1);
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();
        $legalRequirements = LegalRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step01', ['legalRequirements' => $legalRequirements, 'stepsFrameworkProject' => $stepsFrameworkProject]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2_1()
    {
        
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();
        $isEnableNextStep = $this::isEnableNextStep(2);
        $stakeholders = Stakeholders::with('analysis')->paginate( 20 );
        return view('dashboard.framework.framework-step02_1', ['stakeholders' => $stakeholders, 'stepsFrameworkProject' => $stepsFrameworkProject, "isEnableNextStep" => $isEnableNextStep]);
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2_2()
    {
        
        $project = Session::get('currentProject');
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $isEnableNextStep = $this::isEnableNextStep(3);
        $stakeholders = Steps2Framework::with("stakeholder")->get();
        
        return view('dashboard.framework.framework-step02_2', ['stakeholders' => $stakeholders, 'stepsFrameworkProject' => $stepsFrameworkProject, "isEnableNextStep" => $isEnableNextStep]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2ConfirmIdentifyStakeholders(Request $request)
    {

        $stakeholders = $request["stakeholders"];
        $project = Session::get('currentProject');
        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 1)->first();

        if (!empty($stakeholders)) {
            $isMoveNextStep = true;

            foreach($stakeholders as $stakeholdersId) {                
                 $steps2Framework = new Steps2Framework();
                 $steps2Framework->stakeholder_id = $stakeholdersId;
                 $steps2Framework->steps_framework_project_id = $currentStep->id;
                 $steps2Framework->save();
            }

        }

        if (!$isMoveNextStep) {
            $request->session()->flash('message', 'Please select one or more Legal requirements');
            return redirect()->back()->withErrors("error");
        }

        $this::setCompleteStatusStep(2);
        return redirect()->action([FrameworkController::class, 'step2_2']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2ConfirmAnalyzeStakeholder()
    {
        $this::setCompleteStatusStep(3);
        // $this::setCompleteStatusStep(2);
        return redirect()->action([FrameworkController::class, 'step3']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAnalyzeStakeholder($id)
    {
        $stakeholder = Steps2Framework::with('stakeholder')->find($id);
        return view('dashboard.framework.framework-step02_2-stakeholders-show', ['stakeholder' => $stakeholder]);
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAnalyzeStakeholder($id)
    {
        $stakeholder = Steps2Framework::with('stakeholder')->find($id);

        return view('dashboard.framework.framework-step02_2-stakeholders-edit', ['stakeholder' => $stakeholder]);
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
        $isEnableNextStep = $this::isEnableNextStep(4);
        $isEnableNextStep = true;
        $dataCollectionTechniques = DataCollectionTechniques::get();
        // $legalRequirements = LegalRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step03_1', ['dataCollectionTechniques' => $dataCollectionTechniques, 'stepsFrameworkProject' => $stepsFrameworkProject, "isEnableNextStep" => $isEnableNextStep]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3SelectDataCollectionTechniques(Request $request)
    {

        $validatedData = $request->validate([
            'dataCollectionTechnique'    => 'required',
        ]);

        $project = Session::get('currentProject');
        $steps31Framework = new Steps31Framework();
        $steps31Framework->data_collection_technique_id = "";
        $steps31Framework->project_id = $project->id;
        $this::setCompleteStatusStep(4);
        return redirect()->action([FrameworkController::class, 'step3_2']);
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
        $isEnableNextStep = $this::isEnableNextStep(5);
        
        $stakeholders = Steps2Framework::with("stakeholder")->get();
        return view('dashboard.framework.framework-step03_2', ['stakeholders' => $stakeholders, 'stepsFrameworkProject' => $stepsFrameworkProject, "isEnableNextStep" => $isEnableNextStep]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3ViewStakeholderExperience($id)
    {
        
        $stakeholderExperience = StakeholderExperiencies::with('stakeholders')->find($id);
        return view('dashboard.framework.stakeholders-experience-show', ['stakeholderExperience' => $stakeholderExperience]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3EditStakeholderExperience($id)
    {
        
        $stakeholderExperience = StakeholderExperiencies::with('stakeholders')->find($id);
        return view('dashboard.framework.framework-step03-experience-edit', ['stakeholderExperience' => $stakeholderExperience]);
    }


    public function step3ConfirmStakeholderExperience(Request $request, $id)
    {

        $project = Session::get('currentProject');
        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 5)->first();

        $validatedData = $request->validate([
            'factors_that_impact_acceptability'    => 'required',
            'factors_that_impact_usability'    => 'required',
            'proposed_improvements'    => 'required',
            'recommendations'    => 'required',
        ]);

        $factorsThatImpactAcceptability = $request["factors_that_impact_acceptability"];
        $factorsThatImpactUsability = $request["factors_that_impact_usability"];
        $proposedImprovements = $request["proposed_improvements"];
        $recommendations = $request["recommendations"];
        $description = $request["description"];

        $steps32Framework = new Steps32Framework();
        $steps32Framework->steps_framework_project_id = $currentStep->id;
        $steps32Framework->description = $description;
        $steps32Framework->stakeholder_id = $id;
        $steps32Framework->factors_impact_acceptability = $factorsThatImpactAcceptability;
        $steps32Framework->factors_impact_usability = $factorsThatImpactUsability;
        $steps32Framework->proposed_improvements = $proposedImprovements;
        $steps32Framework->recommendations = $recommendations;
        $steps32Framework->save();

        // $this::setCompleteStatusStep(5);
        return redirect()->action([FrameworkController::class, 'step3_2']);
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
        $isEnableNextStep = $this::isEnableNextStep(6);
        $recommendationsNonFunctionalRequirements = NonFunctionalRequirements::whereIn('name', $nonFunctionalRequirementsFromExternal)->get();
        $nonFunctionalRequirements = NonFunctionalRequirements::with('user')->get();
        
        return view('dashboard.framework.framework-step04', ['nonFunctionalRequirements' => $nonFunctionalRequirements, 'recommendationsNonFunctionalRequirements' => $recommendationsNonFunctionalRequirements, 'stepsFrameworkProject' => $stepsFrameworkProject, "isEnableNextStep" => $isEnableNextStep]);
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

        $isMoveNextStep = false;

        $legalRequirements = $request["legalRequirements"];
        $project = Session::get('currentProject');
        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 1)->first();

        if (!empty($legalRequirements)) {
            $isMoveNextStep = true;

            foreach($legalRequirements as $legalRequirementId) {
                $steps1Framework = new Steps1Framework();
                $steps1Framework->legal_requirements_id = $legalRequirementId;
                $steps1Framework->steps_framework_project_id = $currentStep->id;
                $steps1Framework->save();
            }

        }

        if (!$isMoveNextStep) {
            $request->session()->flash('message', 'Please select one or more Legal requirements');
            return redirect()->back()->withErrors("error");
        }

        $this::setCompleteStatusStep(1);
        return redirect()->action([FrameworkController::class, 'step2_1']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3CollectStakeholderExperience(Request $request)
    {
        $this::setCompleteStatusStep(5);
        return redirect()->action([FrameworkController::class, 'step4']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step4ConfirmNonFunctionalRequirements(Request $request)
    {
        $isMoveNextStep = false;
        $recommendationsNonFunctionalRequirements = $request["recommendationsNonFunctionalRequirements"];
        $allNonFunctionalRequirements = $request["nonFunctionalRequirements"];

        NonFunctionalRequirementsForSpecification::where('project_id', '=', '1')->delete();

        if (!empty($recommendationsNonFunctionalRequirements)) {
            $isMoveNextStep = true;
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
        }

        if (!empty($allNonFunctionalRequirements)) {
            $isMoveNextStep = true;
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

        if (!$isMoveNextStep) {
            $request->session()->flash('message', 'Please select one or more Non-Functional Requirements');
            return redirect()->back()->withErrors("error");
        }
        
        $this::setCompleteStatusStep(6);
        return redirect()->action([FrameworkController::class, 'step5']);
    }

    public function downloadAllSIG() {

        $nonFunctionalRequirementsForSpecification = NonFunctionalRequirementsForSpecification::with('nonFunctionalRequirement')->get();
        $arrNonFunctionalRequirements = $this::getAllNonFunctionalRequirements();
        $arrayContent = array();

        foreach($nonFunctionalRequirementsForSpecification as $nonFunctionalRequirementForSpecification) {
            $nonFunctionalRequirement = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement;
            if (empty($nonFunctionalRequirement->content)) continue;

            $element = json_decode($nonFunctionalRequirement->content, true);
            
            foreach($element["orphans"] as $indice => $orphan) {
                if (array_key_exists(strtolower($orphan["text"]), $arrNonFunctionalRequirements)) {
                    $detail = $arrNonFunctionalRequirements[strtolower($orphan["text"])];
                    $orphan["customProperties"]["Description"]         = $detail["description"];
                    $orphan["customProperties"]["Alias"]               = $detail["alias"];
                    $orphan["customProperties"]["Recommendations"]     = $detail["recommendations"];
                    $orphan["customProperties"]["Legal Requirements"]  = $detail["legalRequirements"];
                    $element["orphans"][$indice] = $orphan;
                }
            }
            
            $arrayContent[] = $element;
        }

        $data = $this::mergeSigs($arrayContent);

        $headers = ['Content-Type: application/json'];
        $fileName = "sig-file.txt";
        $fileStorePath = public_path('/tmp/'.$fileName);
        File::put($fileStorePath, $data);

        return response()->download($fileStorePath, $fileName, $headers);
    }

    public function downloadSIG($id) {

        $nonFunctionalRequirementForSpecification = NonFunctionalRequirementsForSpecification::with('nonFunctionalRequirement')->where("id", "=", $id)->first();
        

        $nonFunctionalRequirement = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement;
        $arrNonFunctionalRequirements = $this::getAllNonFunctionalRequirements();

        $element = json_decode($nonFunctionalRequirement->content, true);
        foreach($element["orphans"] as $indice => $orphan) {
            if (array_key_exists(strtolower($orphan["text"]), $arrNonFunctionalRequirements)) {
                $detail = $arrNonFunctionalRequirements[strtolower($orphan["text"])];
                $orphan["customProperties"]["Description"]         = $detail["description"];
                $orphan["customProperties"]["Alias"]               = $detail["alias"];
                $orphan["customProperties"]["Recommendations"]     = $detail["recommendations"];
                $orphan["customProperties"]["Legal Requirements"]  = $detail["legalRequirements"];
                $element["orphans"][$indice] = $orphan;
            }
        }

        $data = json_encode($element);
 
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

    private function getAllNonFunctionalRequirements() {
        $nonFunctionalRequirements = NonFunctionalRequirements::get();
        $arrNonFunctionalRequirements = array();
        
        foreach($nonFunctionalRequirements as $nonFunctionalRequirement) {
            $key = strtolower($nonFunctionalRequirement->alias);

            $legalRequirements = $nonFunctionalRequirement->legalRequirements;
            $legalRequirementsName = array();
            foreach($legalRequirements as $legalRequirement) {
                $legalRequirementsName[] = $legalRequirement->name;
            }
            $arrNonFunctionalRequirements[$key]["description"]          = trim($nonFunctionalRequirement->description);
            $arrNonFunctionalRequirements[$key]["alias"]                = trim($nonFunctionalRequirement->alias);
            $arrNonFunctionalRequirements[$key]["recommendations"]      = trim($nonFunctionalRequirement->recommendations);
            $arrNonFunctionalRequirements[$key]["legalRequirements"]    = implode(";", $legalRequirementsName);
        }

        return $arrNonFunctionalRequirements;
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

    private function isEnableNextStep($currentStep) {

        $project = Session::get('currentProject');

        $previousStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", $currentStep-1)->first();

        if ($previousStep->status == Config::get('constants.frameworkStates.complete')) {
           return true;
        }
        return false;
    }

    private function getIndiceNFRFromArray($elements, $alias) {
        $indice = -1;
        foreach($elements["orphans"] as $key => $nfr) {
            if (strtoupper($nfr["text"]) == strtoupper($alias)) {
                $indice = $key;
                break;
            }
        }

        // var_dump($indice, $nonFunctionalRequirement->name, $nonFunctionalRequirement->alias, $element["orphans"]); exit;
        return $indice;
    }
}
