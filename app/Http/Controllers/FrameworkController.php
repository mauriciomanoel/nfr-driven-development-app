<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LegalAndNormativeRequirements;
use App\Models\Stakeholders;


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
    public function step4()
    {
        $legalAndNormativeRequirements = LegalAndNormativeRequirements::with('user')->paginate( 20 );
        return view('dashboard.framework.framework-step04', ['legalAndNormativeRequirements' => $legalAndNormativeRequirements]);
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

    
}
