@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>Stakeholder Experience:</strong> {{ $stakeholderExperience->stakeholders->name }}</div>
                    <div class="card-body">
                      <form method="POST" action="/framework/step3/confirmStakeholderExperience/{{ $stakeholderExperience->id }}">
                        @csrf
                          
                          <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Description:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="description">{{ $stakeholderExperience->description }}</textarea>
                                @error('description')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Factors That Impact Acceptability:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="factors_that_impact_acceptability">{{ $stakeholderExperience->factors_that_impact_acceptability }}</textarea>
                                @error('factors_that_impact_acceptability')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Factors That Impact Usability:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="factors_that_impact_usability">{{ $stakeholderExperience->factors_that_impact_usability }}</textarea>
                                @error('factors_that_impact_usability')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Proposed Improvements:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="proposed_improvements">{{ $stakeholderExperience->proposed_improvements }}</textarea>
                                @error('proposed_improvements')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col">
                                <label><h5><strong>Recommendations:</strong></h5> </label>
                                <textarea class="form-control myedittextarea" name="recommendations">{{ $stakeholderExperience->recommendations }}</textarea>
                                @error('recommendations')
                                  <div class="alert alert-danger">{{ $message }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                @enderror
                            </div>
                          </div>
                                                                            
                          <h5><strong>Last Update:</strong></h5> 
                          <p>{{ $stakeholderExperience->updated_at }}</p>  
                          
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