@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Requirement: {{ $requirement->name }}</div>
                    <div class="card-body">
                        <h5>Author:</h5>
                        <p> {{ $requirement->user->name }}</p>
                        <h5>Name:</h4>
                        <p> {{ $requirement->name }}</p>
                        <h5>Description:</h5> 
                        <p>{{ $requirement->description }}</p>
                        <h5>Model Quality:</h5> 
                        <p>{{ $requirement->model_quality }}</p>
                        <h5>Main Requirement/Characteristics:</h5> 
                        <p>{{ $requirement->parent ? $requirement->parent->name: "no owner" }}</p>
                        <h5>Source:</h5> 
                        <p>{{ $requirement->source }}</p>
                        <h5>Date:</h5> 
                        <p>{{ $requirement->created_at }}</p>                     
                        <a href="{{ route('requirements.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection