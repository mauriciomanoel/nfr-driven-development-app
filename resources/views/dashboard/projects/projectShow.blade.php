@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Project: {{ $project->title }}</div>
                    <div class="card-body">
                        <h5>Author:</h5>
                        <p> {{ $project->user->name }}</p>
                        <h5>Title:</h4>
                        <p> {{ $project->title }}</p>
                        <h5>Description:</h5> 
                        <p>{{ $project->description }}</p>
                        <h5>Life Settings:</h5> 
                        <p>{{ $project->lifeSettings->name }}</p>
                        <h5>Date:</h5> 
                        <p>{{ $project->created_at }}</p>                     
                        <a href="{{ route('projects.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection