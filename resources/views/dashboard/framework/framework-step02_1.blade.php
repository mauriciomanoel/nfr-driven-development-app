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

              <p>Esta etapa tem como objetivo identificar os diferentes stakeholders envolvidos no sistema AAL.</p> 
              <p><strong>Saída:</strong> Lista de stakeholders relevantes do sistema AAL.</p>
              <form method="POST" action="{{ route('framework.step2.confirmIdentifyStakeholders') }}">
                    @csrf              
              <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($stakeholders as $stakeholder)
                      <tr>
                        <td><input type="checkbox" id="stakeholders" name="stakeholders[]" value="{{ $stakeholder->id }}"></strong></td>
                        <td><strong>{{ $stakeholder->name }}</strong></td>
                        <td>{{ $stakeholder->description }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $stakeholders->links() }}
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

