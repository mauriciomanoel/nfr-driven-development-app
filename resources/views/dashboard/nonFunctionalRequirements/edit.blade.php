@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $project->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="/projects/{{ $project->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" value="{{ $project->title }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label>Content</label>
                                    <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}" required>{{ $project->content }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label>Status</label>
                                    <select class="form-control" name="subdomains_id" disabled>
                                        @foreach($subdomains as $subdomain)
                                            @if( $subdomain->id == $project->subdomains_id )
                                                <option value="{{ $subdomain->id }}" selected="true">{{ $subdomain->name }}</option>
                                            @else
                                                <option value="{{ $subdomain->id }}">{{ $subdomain->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                    <a href="{{ route('projects.index') }}" class="btn btn-block btn-primary">{{ __('Go Back') }}</a> 
                                </div>
                            </div>
 
                            
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection