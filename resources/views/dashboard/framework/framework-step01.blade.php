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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 1: Levantar Requisitos Legais') }}</strong>
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

                <p>Esta etapa tem como objetivo identificar e analisar os requisitos legais, regulamentos, diretrizes e padrões relevantes para sistemas AAL, com foco na usabilidade e aceitabilidade. </p>

                <p>Essa documentação apresenta informações sobre o requisito legal ou normativo relevante, incluindo o nome, descrição, texto legal/referência e os requisitos não funcionais impactados por este requisito.</p>
              
                <p><strong>Saída:</strong> Documentação dos requisitos legais e normativos identificados e analisados.</p>
                
                <form method="POST" action="{{ route('framework.step1.confirmLegalRequirement') }}">
                    @csrf
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <!-- <th>Status</th> -->
                      <!-- <th>Note type</th> -->
                      <th colspan="3" class="text-center">Actions</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($legalRequirements as $legalAndNormativeRequirement)
                      <tr>
                        <td><input type="checkbox" id="legalRequirements" name="legalRequirements[]" value="{{ $legalAndNormativeRequirement->id }}"></strong></td>
                        <td><strong>{{ $legalAndNormativeRequirement->name }}</strong></td>
                        <td>{{ $legalAndNormativeRequirement->description }}</td>
                        <td>{{ $legalAndNormativeRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('/legalRequirements/' . $legalAndNormativeRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                        </td>
                        <!--<td>
                          <a href="{{ url('/legalRequirements/' . $legalAndNormativeRequirement->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('legalRequirements.destroy', $legalAndNormativeRequirement->id ) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-block btn-danger">Delete</button>
                          </form>
                        </td> -->
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $legalRequirements->links() }}
                <button class="btn btn-block btn-primary" type="submit">{{ __('Save and Advance to the next phase') }}</button>                    
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
<link href="{{ asset('css/bootstrap-3.1.0.css') }}" rel="stylesheet">
<link href="{{ asset('css/process-steps.css') }}" rel="stylesheet">
@endsection

