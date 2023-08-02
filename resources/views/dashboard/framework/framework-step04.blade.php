@extends('dashboard.base')

@section('content')

  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card">
              
              @if($errors->any())
                  <div class="row">
                      <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                          <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>

                      </div>
                  </div>
              @endif

              <div class="card-header">
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 4: Definir Requisitos não Funcionais') }}</strong>
              </div>
              <div class="card-body">

              <div class="row justify-content-md-center bs-wizard" style="border-bottom:0;">                        
                  @foreach($stepsFrameworkProject as $stepFrameworkProject)
                      <div class="col-xs-2 bs-wizard-step {{ $stepFrameworkProject->status }}">
                        <div class="text-center bs-wizard-stepnum">{{ $stepFrameworkProject->StepsFramework->code }}</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ route('framework.'. str_replace(" ", "", strtolower($stepFrameworkProject->StepsFramework->code))) }}" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center">{{ $stepFrameworkProject->StepsFramework->name }}</div>
                      </div>
                  @endforeach                  
              </div>

              <p>Com base nos requisitos legais e normativos identificados, bem como nas informações coletadas sobre a experiência dos stakeholders, os requisitos não funcionais relacionados à usabilidade e aceitabilidade do sistema AAL são definidos</p>
              <p><strong>Saída:</strong>Documentação dos requisitos não funcionais específicos relacionados à usabilidade e aceitabilidade do sistema AAL.</p>
                </br>
                <h2><strong>Recommendations Non-Functional Requirements</strong></h2>
                <p>NFR recommendations based on previous steps</p>
                <form method="POST" action="{{ url('framework/confirmNonFunctionalRequirements') }}">
                  {{ csrf_field() }}
                  <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Last Update</th>
                        <th colspan="3" class="text-center">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($recommendationsNonFunctionalRequirements as $recommendationNonFunctionalRequirement)
                        <tr>
                          <td><input type="checkbox" id="recommendationNonFunctionalRequirement" name="recommendationsNonFunctionalRequirements[]" value="{{ $recommendationNonFunctionalRequirement->id }}"></td>
                          <td><strong>{{ $recommendationNonFunctionalRequirement->name }}</strong></td>
                          <td>{{ $recommendationNonFunctionalRequirement->description }}</td>
                          <td>{{ $recommendationNonFunctionalRequirement->updated_at }}</td>                        
                          <td>
                            <a href="{{ url('/nonFunctionalRequirements/' . $recommendationNonFunctionalRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                          </td>                        
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <h3><strong>All the Non-Functional Requirements</strong></h3>
                  <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Last Update</th>
                        <th colspan="3" class="text-center">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($nonFunctionalRequirements as $nonFunctionalRequirement)
                        <tr>
                          <td><input type="checkbox" id="nonFunctionalRequirement" name="nonFunctionalRequirements[]" value="{{ $nonFunctionalRequirement->id }}"></td>
                          <td><strong>{{ $nonFunctionalRequirement->name }}</strong></td>
                          <td>{{ $nonFunctionalRequirement->description }}</td>
                          <td>{{ $nonFunctionalRequirement->updated_at }}</td>                        
                          <td>
                            <a href="{{ url('/nonFunctionalRequirements/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                          </td>                        
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

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

