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
use App\Models\Steps5Framework;
use App\Models\Projects;
use App\Models\DataCollectionTechniques;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use File;
use Session;
use Illuminate\Support\Facades\Config;
use Dompdf\Dompdf;
use Dompdf\Options;


ini_set('max_execution_time', 180); //3 minutes

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
        $project = $this::getCurrentProject();
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
        
        $project = $this::getCurrentProject();
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
        
        $project = $this::getCurrentProject();
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
        
        $project = $this::getCurrentProject();
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
        $project = $this::getCurrentProject();
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
        $project = $this::getCurrentProject();
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

        $dataCollectionTechniques = DataCollectionTechniques::where("name", "like", $request["dataCollectionTechnique"])->first();
        $project = $this::getCurrentProject();
        $steps31Framework = new Steps31Framework();
        $steps31Framework->data_collection_technique_id = $dataCollectionTechniques->id;
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
        $project = $this::getCurrentProject();
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
        
        $stakeholderExperience = Steps32Framework::with('stakeholder')->find($id);
        // var_dump($stakeholderExperience->stakeholder->name); exit;
        return view('dashboard.framework.stakeholders-experience-show', ['stakeholderExperience' => $stakeholderExperience]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step3EditStakeholderExperience($id)
    {
        
        $stakeholderExperience = Steps32Framework::with('stakeholder')->find($id);
        return view('dashboard.framework.framework-step03-experience-edit', ['stakeholderExperience' => $stakeholderExperience]);
    }


    public function step3ConfirmStakeholderExperience(Request $request, $id)
    {

        $project = $this::getCurrentProject();
        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 5)->first();

        $validatedData = $request->validate([
            'factors_that_impact_acceptability'    => 'required',
            'factors_that_impact_usability'    => 'required',
            'proposed_improvements'    => 'required',
            'recommendations'    => 'required',
        ]);

        $steps32Framework = new Steps32Framework();
        $steps32Framework->steps_framework_project_id = $currentStep->id;
        $steps32Framework->description = html_entity_decode($request["description"]);
        $steps32Framework->stakeholder_id = $id;
        $steps32Framework->factors_impact_acceptability = html_entity_decode($request["factors_that_impact_acceptability"]);
        $steps32Framework->factors_impact_usability = html_entity_decode($request["factors_that_impact_usability"]);
        $steps32Framework->proposed_improvements = html_entity_decode($request["proposed_improvements"]);
        $steps32Framework->recommendations = html_entity_decode($request["recommendations"]);
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
        
        $project = $this::getCurrentProject();
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $valueTreinamento = storage_path() . "/python/treinamento.txt";
        $valueText = storage_path() . "/python/texto.txt";

        $command = "python3 " . storage_path() . "/python/classification_of_non_functional_requirements_1.3.py " . $valueTreinamento . " " . $valueText;
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

        $project = $this::getCurrentProject();
        $stepsFrameworkProject = StepsFrameworkProject::with("StepsFramework")->where("project_id", "=", $project->id)->get();

        $nonFunctionalRequirementsForSpecification = Steps5Framework::with('nonFunctionalRequirement')->where("project_id", "=", $project->id)->get();
        
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
        $project = $this::getCurrentProject();
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
        $project = $this::getCurrentProject();

        if (!empty($recommendationsNonFunctionalRequirements)) {
            $isMoveNextStep = true;
            foreach($recommendationsNonFunctionalRequirements as $recommendationNonFunctionalRequirement) {                
                $nfrForSpecification = new Steps5Framework();
                $nfrForSpecification->project_id = $project->id;
                $nfrForSpecification->users_id = 1;
                $nfrForSpecification->is_recommendation = 1;
                $nfrForSpecification->nfr_id = $recommendationNonFunctionalRequirement;
                // $nfrForSpecification->legal_requirements_id="1,2,3";
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
                $nfrForSpecification = new Steps5Framework;
                $nfrForSpecification->project_id = $project->id;
                $nfrForSpecification->users_id = 1;
                $nfrForSpecification->is_recommendation = 0;
                $nfrForSpecification->nfr_id = $nonFunctionalRequirement;
                // $nfrForSpecification->legal_requirements_id="1,2,3";
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

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function step5ViewEspecification($id)
    {
        // $this::setCompleteStatusStep(5);
        $nonFunctionalRequirement = Steps5Framework::with('nonFunctionalRequirement')->find($id);
        return view('dashboard.framework.framework-step05-especification-show', ['nonFunctionalRequirement' => $nonFunctionalRequirement]);
    }

    public function step5EditEspecification($id)
    {        
        $nonFunctionalRequirement = Steps5Framework::with('nonFunctionalRequirement')->find($id);
        return view('dashboard.framework.framework-step05-especification-edit', ['nonFunctionalRequirement' => $nonFunctionalRequirement]);
    }

    public function step5ConfirmEspecification(Request $request, $id)
    {
       
        $request->validate([
            'fileImage' => 'required|mimes:png|max:4000',
            'fileSIG' => 'required|mimes:txt,json|max:4000',
            'description' => 'required|max:2048',
            'acceptance_criteria' => 'required|max:2048',
            'evaluation_metrics' => 'required|max:2048',
        ]);

        
        $fileImage = time().'.'.$request->fileImage->extension();  
        $request->fileImage->move(public_path('tmp'), $fileImage);

        $fileSIG = time().'.'.$request->fileSIG->extension();  
        $request->fileSIG->move(public_path('tmp'), $fileSIG);

        $nfrForSpecification = Steps5Framework::find($id);
        $nfrForSpecification->description = html_entity_decode($request["description"]);
        $nfrForSpecification->acceptance_criteria = html_entity_decode($request["acceptance_criteria"]);
        $nfrForSpecification->evaluation_metrics = html_entity_decode($request["evaluation_metrics"]);
        $nfrForSpecification->content = file_get_contents(public_path('tmp') . "/" . $fileSIG);
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(public_path('tmp') . "/" . $fileImage));
        $nfrForSpecification->save();
        
        File::delete(public_path('tmp') . "/" . $fileImage);
        File::delete(public_path('tmp') . "/" . $fileSIG);

        return redirect()->action([FrameworkController::class, 'step5']);

    }

    public function downloadAllSIG() {

        $nonFunctionalRequirementsForSpecification = Steps5Framework::with('nonFunctionalRequirement')->get();
        // $nonFunctionalRequirementsForSpecification = Steps5Framework::with('nonFunctionalRequirement')->where("nfr_id", "=", 28)->get();

        $arrNonFunctionalRequirements = $this::getAllNonFunctionalRequirements();
        $arrayContent = array();

        foreach($nonFunctionalRequirementsForSpecification as $nonFunctionalRequirementForSpecification) {
            $nonFunctionalRequirement = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement;
            if (empty($nonFunctionalRequirementForSpecification->content)) continue;

            // var_dump($nonFunctionalRequirement->id, $nonFunctionalRequirement->name);
            $element = json_decode($nonFunctionalRequirementForSpecification->content, true);
            
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
        $fileName = "full-sigs-file-".time().".txt";
        $fileStorePath = public_path('/tmp/'.$fileName);
        File::put($fileStorePath, $data);

         return response()->download($fileStorePath, $fileName, $headers);
    }

    public function downloadSIG($id) {

        $nonFunctionalRequirementForSpecification = Steps5Framework::with('nonFunctionalRequirement')->where("id", "=", $id)->first();
        
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

    public function downloadSIGEspecification($id) {

        $nonFunctionalRequirementForSpecification = Steps5Framework::with('nonFunctionalRequirement')->where("id", "=", $id)->first();
        
        $nonFunctionalRequirement = $nonFunctionalRequirementForSpecification->nonFunctionalRequirement;
        $arrNonFunctionalRequirements = $this::getAllNonFunctionalRequirements();

        $element = json_decode($nonFunctionalRequirementForSpecification->content, true);
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

        // var_dump($arrNonFunctionalRequirements);
        $data = json_encode($element);
 
        $headers = ['Content-Type: application/json'];
        $fileName = "sig-" . $nonFunctionalRequirement->name . "-file.txt";
        $fileStorePath = public_path('/tmp/'.$fileName);
        File::put($fileStorePath, $data);

        return response()->download($fileStorePath, $fileName, $headers);
    }

    public function downloadFullDocument() {
        
        $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf($options);

        $htmlHeader = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
        <style>
            * {
            font-family: helvetica,georgia,serif;            
            }
            
            p {
            text-align: justify;
            font-size: 1em;
            margin: 0.5em;
            padding: 10px;
            }

            .page-break {
                page-break-after: always;
            }

            h1 {
                text-align: center;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }
              
              td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
              }
              
              tr:nth-child(even) {
                background-color: #dddddd;
            }


            img {
                -ms-transform: rotate(90deg); /* IE 9 */
                -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
                transform: rotate(90deg);
             }
            .center {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 30%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
              }
        </style>
        </head>
        <body>';
        
        $project = $this::getCurrentProject();

        $htmlBody = '<h1>' . mb_strtoupper($project->title, 'UTF-8') . '</h1>';
        $htmlBody .= '<p><strong>Description:</strong>' . $project->description . '</p>';
        $htmlBody .= '<p><strong>Subdomain:</strong>' . $project->lifeSettings->name . '</p>';
        $htmlBody .= '<div class="page-break"></div>';

        $htmlBody .= '<h1>LEVANTAMENTO DE REQUISITOS LEGAIS</h1>';
        
        $legalRequirements = Steps1Framework::get();

        foreach($legalRequirements as $legalRequirement) {
            $htmlBody .= '<p><strong>Legal Requirement:</strong> ' . $legalRequirement->legalRequirement->name . '</p>';
            $htmlBody .= '<p><strong>Description</strong></p>';
            $htmlBody .= '' . $legalRequirement->legalRequirement->description . '';
            $htmlBody .= '<p><strong>Legal Text/Reference</strong></p>';
            $htmlBody .= '' . $legalRequirement->legalRequirement->legal_references . '';
            $htmlBody .= '<p><strong>Recommendations</strong></p>';
            $htmlBody .= '' . $legalRequirement->legalRequirement->recommendations . '';

            $htmlBody .= '<p><strong>Non-Functional Requirements</strong></p>';

            $htmlBody .= '<table><tr><th>Name</th><th>Description</th></tr>';
            foreach($legalRequirement->legalRequirement->nonFunctionRequeriments as $nonFunctionRequeriment) {
                $htmlBody .= '<tr><td>' . $nonFunctionRequeriment->name . '</td><td>' . $nonFunctionRequeriment->description . '</td></tr>';
            }
            $htmlBody .= '</table>';
            $htmlBody .= '<div class="page-break"></div>';
        }

        $htmlBody .= '<h1>IDENTIFICAÇÃO E ANÁLISE DE STAKEHOLDERS</h1>';

        $stakeholders = Steps2Framework::get();

        foreach($stakeholders as $stakeholder) {            
            $htmlBody .= '<p><strong>Stakeholders:</strong>' . $stakeholder->stakeholder->name . '</p>';
            $htmlBody .= '<p><strong>Description:</strong>' . $stakeholder->stakeholder->description . '</p>';
            $htmlBody .= '<p><strong>Identified Needs</strong></p>';
            $htmlBody .= '' . $stakeholder->identified_needs . '';
            $htmlBody .= '<p><strong>Expectations</strong></p>';
            $htmlBody .= '' . $stakeholder->expectations . '';
            $htmlBody .= '<p><strong>Experiences</strong></p>';
            $htmlBody .= '' . $stakeholder->experiences . '';
        }

        $dataCollectionTechnique = Steps31Framework::where("project_id", "=", $project->id)->first();
 
        $htmlBody .= '<h1>COLETAR EXPERIÊNCIA DOS STAKEHOLDERS</h1>';
        $htmlBody .= '<p><strong>Técnica para coleta de dados:</strong>' . $dataCollectionTechnique->dataCollectionTechniques->name . '</p>';

        $experiencies = Steps32Framework::get();

        foreach($experiencies as $experiencie) {
            $htmlBody .= '<p><strong>Stakeholder Experience:</strong>' . $experiencie->stakeholder->name . '</p>';
            $htmlBody .= '<p><strong>Description</strong></p>';
            $htmlBody .= '' . $experiencie->description . '';
            $htmlBody .= '<p><strong>Factors That Impact Acceptability</strong></p>';
            $htmlBody .= '' . $experiencie->factors_impact_acceptability . '';
            $htmlBody .= '<p><strong>Factors That Impact Usability</strong></p>';
            $htmlBody .= '' . $experiencie->factors_impact_usability . '';    
            $htmlBody .= '<p><strong>Proposed Improvements</strong></p>';
            $htmlBody .= '' . $experiencie->proposed_improvements . '';
            $htmlBody .= '<p><strong>Recommendations</strong></p>';
            $htmlBody .= '' . $experiencie->recommendations . '';
        }

        $htmlBody .= '<div class="page-break"></div>';

        // $htmlBody .= '<h1>DEFINIR REQUISITOS NÃO FUNCIONAIS</h1>';
        $htmlBody .= '<h1>ESPECIFICAR REQUISITOS NÃO FUNCIONAIS</h1>';

        $nonFunctionRequerimentsForEspecification = Steps5Framework::get();
        // $htmlBody .= '<table><tr><th>Name</th><th>Description</th></tr>';
        foreach($nonFunctionRequerimentsForEspecification as $nonFunctionRequeriment) {
            $htmlBody .= '<p><strong>NonFunctional Requirement:</strong> ' . $nonFunctionRequeriment->nonFunctionalRequirement->name . '</p>';
            $htmlBody .= '<p><strong>Description</strong></p>';
            $htmlBody .= '' . $nonFunctionRequeriment->description . '';
            $htmlBody .= '<p><strong>Acceptance Criteria</strong></p>';
            $htmlBody .= '' . $nonFunctionRequeriment->acceptance_criteria . '';
            $htmlBody .= '<p><strong>Evaluation Metrics</strong></p>';
            $htmlBody .= '' . $nonFunctionRequeriment->evaluation_metrics . '';

            if ($nonFunctionRequeriment->nonFunctionalRequirement->image != "") {
                $htmlBody .= '<div class="page-break"></div>';
                $htmlBody .= '<figure>';
                $htmlBody .= '<div class="center"><img src="' . $nonFunctionRequeriment->nonFunctionalRequirement->image . '" width="180%"></div>';
                $htmlBody .= '<figcaption>Softgoal Interdependency Graph: ' . $nonFunctionRequeriment->nonFunctionalRequirement->name . '</figcaption>';
                $htmlBody .= '</figure>';
                $htmlBody .= '<div class="page-break"></div>';
            }
        }
        $htmlBody .= '</table>';
        $htmlBody .= '<div class="page-break"></div>';
        
    
        $htmlFooter = '</body> </html>';
        $dompdf->loadHtml($htmlHeader . $htmlBody . $htmlFooter);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        
    }

    public function mergeSigs($arrayContent) {
        

        $replaceIds = array();
        foreach($arrayContent as $element) {
            foreach($element["orphans"] as $key => $orphan) {
                $replaceIds[] = $orphan["id"];
            }
        }

        $counts = array_count_values($replaceIds);

        $duplicates = [];

foreach ($counts as $value => $count) {
    if ($count > 1) {
        $duplicates[] = $value;
    }
}


        // var_Dump($duplicates); exit;

        $tempElement = json_encode($arrayContent);

            // var_dump($replaceIds, $tempElement); 


            // replace Ids
            foreach($duplicates as $id) {
                $uuid = Str::uuid()->toString();
                $tempElement = str_replace($id, $uuid, $tempElement);
            }



            // return json_encode($tempElement);
        $arrayContent = json_decode($tempElement, true);

        $firstArray = array_shift($arrayContent);
        
        $maxValueX = $this::getMaxValueFromArray($firstArray["orphans"]);

        foreach($arrayContent as $element) {
            if (empty($element)) continue;
            
            $replaceIds = array();
            $tempElement = "";

            // $element = json_decode($value, true);                
            foreach($element["orphans"] as $key => $orphan) {
                $element["orphans"][$key]["x"] += $maxValueX;
                $replaceIds[] = $orphan["id"];
            }

            // $tempElement = json_encode($element);

            // var_dump($replaceIds, $tempElement); 


            // replace Ids
            // foreach($replaceIds as $id) {
            //     $uuid = Str::uuid()->toString();

            //     var_dump("DE: ". $id . " PARA: ". $uuid); 

            //     $tempElement = str_replace($id, $uuid, $tempElement);
            // }

            
            // $element = json_decode($tempElement, true);
            $firstArray["orphans"] = array_merge($firstArray["orphans"], $element["orphans"]);
            $firstArray["links"] = array_merge($firstArray["links"], $element["links"]);
            $firstArray["display"] = array_merge($firstArray["display"], $element["display"]);

            $maxValueX = $this::getMaxValueFromArray($firstArray["orphans"]);
        }
        
        $firstArray["diagram"]["customProperties"]["Description"] = "Generation by NFR-DD Framework";
        $firstArray["saveDate"] = gmdate("M d Y H:i:s");
        $firstArray["diagram"]["name"] = "New SIG";
        $firstArray["diagram"]["width"] = $maxValueX + 200;


        // var_dump( json_encode($firstArray)); exit;
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

        $project = $this::getCurrentProject();

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

        $project = $this::getCurrentProject();

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

        $project = $this::getCurrentProject();

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

    private function getCurrentProject() {
        if (is_null(Session::get('currentProject'))) {
            $user = auth()->user();
            $project = Projects::where('users_id',$user->id)->where("current",1)->first();
            Session::put('currentProject', $project);
        } 

        return Session::get('currentProject');
    }
}
