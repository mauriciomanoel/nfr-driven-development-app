@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>Stakeholder:</strong> {{ $stakeholder->name }}</div>
                    <div class="card-body">
                      <form method="POST" action="/framework/confirmAnalyzeStakeholder/{{ $stakeholder->id }}">

                      @csrf
                      
                        <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Description:</strong></h5> </label>
                                <input class="form-control" type="text" placeholder="{{ __('Description') }}" value="{{ $stakeholder->stakeholder->description }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Identified Needs:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="identifiedNeeds" rows="5">{{ $stakeholder->identified_needs }}</textarea>
                                @error('identifiedNeeds')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Expectations:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="expectations" rows="5">{{ $stakeholder->expectations }}</textarea>
                                @error('expectations')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                              </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Experiences:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="experiences" rows="5">{{ $stakeholder->experiences }}</textarea>
                                @error('experiences')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                              </div>
                           
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Last Update:</strong></h5> </label>
                                <p>{{ $stakeholder->created_at }}</p>
                            </div>
                        </div>
                        
                        <button class="btn btn-block btn-primary" type="submit">{{ __('Save and Go Back') }}</button>
                        </form>

                        <br>
                        <a href="{{ url()->previous() }}" class="btn btn-block btn-primary">{{ __('Go Back') }}</a>                        
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

<script src="https://cdn.tiny.cloud/1/u48r075b2w4zz904v3b9a0o8wydqfpyixu23g47hcj55efpv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
   tinymce.init({
     selector: '.myedittextarea', // Replace this CSS selector to match the placeholder element for TinyMCE
     menubar:false,
     statusbar: false,
     toolbar: 'undo redo'
   });
 </script>

@endsection