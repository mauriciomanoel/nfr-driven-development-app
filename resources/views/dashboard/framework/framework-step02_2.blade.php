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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 2: Identificar e Análise de Stakeholders') }}</strong>
              </div>
              <div class="card-body">
                <div class="row justify-content-md-center bs-wizard" style="border-bottom:0;">                        
                  @foreach($stepsFrameworkProject as $stepFrameworkProject)
                      <div class="col-xs-2 bs-wizard-step {{ $stepFrameworkProject->status }}">
                        <div class="text-center bs-wizard-stepnum">{{ $stepFrameworkProject->StepsFramework->code }}</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ route('framework.step2.1') }}" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center"></div>
                      </div>
                  @endforeach                  
                </div>

              <p>Esta etapa tem como objetico identificar os diferentes stakeholders envolvidos no sistema AAL e analisar suas necessidades, expectativas e experiências em relação ao sistema.</p> 
              <p>Sua análise deve ter o foco na usabilidade e aceitabilidade, permitindo priorizar as demandas dos stakeholders e estabelecer uma comunicação efetiva ao longo do processo de desenvolvimento.</p>
              <p><strong>Saída:</strong> Lista de stakeholders relevantes e documentação das suas necessidades, expectativas e experiências relacionadas à usabilidade e aceitabilidade do sistema AAL.</p>
              
              <form method="POST" action="{{ route('framework.step2.confirmAnalyzeStakeholders') }}">
                    @csrf  
                
                @if(count($stakeholders) > 0)
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($stakeholders as $stakeholder)
                      <tr>
                        <td><strong>{{ $stakeholder->stakeholder->name }}</strong></td>
                        <td>{{ $stakeholder->stakeholder->description }}</td>
                        <td>{{ $stakeholder->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('framework/detailStakeholders/' . $stakeholder->id) }}" class="btn btn-block btn-primary">Detail</a>
                        </td> 
                        <td>
                          <a href="{{ url('framework/analyzeStakeholders/' . $stakeholder->id) }}" class="btn btn-block btn-primary">Analyze</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <div class="alert alert-warning" role="alert">You need to select a stakeholder in the previous step.</div>
                @endif
                
                <button class="btn btn-block {{ $isEnableNextStep ? "btn-primary" : "btn-secondary" }}" type="submit" {{ $isEnableNextStep ? "" : "disabled" }}>{{ __('Save and Advance to the next phase') }}</button>
                @if (!$isEnableNextStep)
                    <div class="disabled-explanation text-center">
                        {{ __('This button is disabled because you need to confirm the previous step to execute this step.') }}
                    </div>
                @endif
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
<link href="{{ asset('css/process-steps.css') }}" rel="stylesheet">

@endsection

