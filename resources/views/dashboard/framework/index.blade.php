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
                      <i class="fa fa-align-justify"></i>{{ __('NFR-driven developlment Framework') }}
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

