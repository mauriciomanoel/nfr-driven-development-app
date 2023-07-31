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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 3.2: Coletar Experiência dos Stakeholders') }}</strong>
              </div>
              <div class="card-body">

              <div class="row justify-content-md-center bs-wizard" style="border-bottom:0;">                        
                  @foreach($stepsFrameworkProject as $stepFrameworkProject)
                      <div class="col-xs-2 bs-wizard-step {{ $stepFrameworkProject->status }}">
                        <div class="text-center bs-wizard-stepnum">{{ $stepFrameworkProject->StepsFramework->code }}</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ route('framework.step2') }}" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center"></div>
                      </div>
                  @endforeach                  
              </div>

                <p>Esta etapa tem como descrever o que foi coletado de informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL.</p> 
                              
                <p><strong>Saída:</strong> Dados e insights obtidos a partir das atividades de coleta de experiência dos stakeholders.</p>
              
                <form method="POST" action="{{ route('framework.step3.confirmCollectStakeholderExperience') }}">
                    @csrf
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <!-- <th>Author</th> -->
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($stakeholderExperiencies as $stakeholderExperience)
                      <tr>
                        <td><strong>{{ $stakeholderExperience->stakeholders->name }}</strong></td>
                        <td>{{ $stakeholderExperience->description }}</td>
                        <td>{{ $stakeholderExperience->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('framework/stakeholders/experiencies/' . $stakeholderExperience->id) }}" class="btn btn-block btn-primary">Detail</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $stakeholderExperiencies->links() }}
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

<link href="{{ asset('css/process-steps.css') }}" rel="stylesheet">

@endsection

