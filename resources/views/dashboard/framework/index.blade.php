@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">

                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          </div>

                        </div>
                    </div>
                @endif  
                
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('NFR-driven developlment Framework AAL') }}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-md-center bs-wizard" style="border-bottom:0;">
                        
                            <div class="col-xs-2 bs-wizard-step complete">
                              <div class="text-center bs-wizard-stepnum">Step 1</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="{{ route('framework.step1') }}" class="bs-wizard-dot"></a>
                              <div class="bs-wizard-info text-center">Levantar Requisitos Legais e Normativos</div>
                            </div>
                            
                            <div class="col-xs-2 bs-wizard-step active"><!-- complete -->
                              <div class="text-center bs-wizard-stepnum">Step 2</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="{{ route('framework.step2') }}" class="bs-wizard-dot"></a>
                              <div class="bs-wizard-info text-center">Identificar e Análise de Stakeholders</div>
                            </div>
                            
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- complete -->
                              <div class="text-center bs-wizard-stepnum">Step 3</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="{{ route('framework.step3') }}" class="bs-wizard-dot"></a>
                              <div class="bs-wizard-info text-center">Coletar da Experiência dos Stakeholders</div>
                            </div>
                            
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 4</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="{{ route('framework.step4') }}" class="bs-wizard-dot"></a>
                              <div class="bs-wizard-info text-center"> Definir de Requisitos Não Funcionais</div>
                            </div>
                            
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 5</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="{{ route('framework.step5') }}" class="bs-wizard-dot"></a>
                              <div class="bs-wizard-info text-center"> Espeficicar dos Requisitos Não Funcionais</div>
                            </div>

                  
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{ asset('css/bootstrap-3.1.0.css') }}" rel="stylesheet">
<link href="{{ asset('css/process-steps.css') }}" rel="stylesheet">


@endsection

