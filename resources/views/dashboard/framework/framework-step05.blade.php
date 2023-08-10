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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 5: Especificar os Requisitos não Funcionais') }}</strong>
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

                <p>Os requisitos não funcionais são especificados de forma clara e precisa, fornecendo operacionalizações e justificativas (Claim) nas operacionalizações sobre cada requisito não funcional entre outros elementos relevantes.<p> 
                <p><strong>Saída:</strong> Documentação detalhada (SIG) dos requisitos não funcionais especificados.</p>
              
                @if(count($nonFunctionalRequirements) > 0)

                <p><a href="{{route('framework.download.full.document')}}" download="" class="btn btn-primary btn-block"><strong>Download Full Document</strong></a></p>
                <p><a href="{{route('framework.download.all.sig')}}" download="" class="btn btn-primary btn-block"><strong>Download All SIG File</strong></a></p>

                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Recomentation</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nonFunctionalRequirements as $nonFunctionalRequirement)
                      <tr>
                        <td><strong>{{ $nonFunctionalRequirement->nonFunctionalRequirement->name }}</strong></td>
                        <td>{{ $nonFunctionalRequirement->nonFunctionalRequirement->description }}</td>
                        <td>{{ $nonFunctionalRequirement->is_recommendation }}</td>
                        <td>{{ $nonFunctionalRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{route('framework.download.sig',$nonFunctionalRequirement->id)}}" class="btn btn-block btn-primary"> SIG</a>
                        </td>
                        <td>
                          <a href="{{route('framework.step5.viewEspecification',$nonFunctionalRequirement->id)}}" class="btn btn-block btn-primary">View</a>
                        </td>
                        <td>
                          <a href="{{route('framework.step5.editEspecification',$nonFunctionalRequirement->id)}}" class="btn btn-block btn-primary">Edit</a>
                        </td>
                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>  
                @else
                  <div class="alert alert-warning" role="alert">You need to select a Non-Functional Requirements in the previous step.</div>
                @endif                          
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

