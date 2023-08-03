@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>NonFunctional Requirement:</strong> {{ $nonFunctionalRequirement->nonFunctionalRequirement->name }}</div>
                      <div class="card-body">
                        <form method="POST" action="/framework/step5/confirmEspecification/{{ $nonFunctionalRequirement->id }}" enctype="multipart/form-data">
                          @csrf    
                            <div class="form-group">
                              <div class="col">
                                  <label><h5><strong>Description:</strong></h5> </label>
                                  <textarea class="form-control myedittextarea" name="description">{{ $nonFunctionalRequirement->description }}</textarea>
                                  @error('description')
                                    <div class="alert alert-danger">{{ $message }}
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                  @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col">
                                  <label><h5><strong>Acceptance Criteria:</strong></h5> </label>
                                  <textarea class="form-control myedittextarea" name="acceptance_criteria">{{ $nonFunctionalRequirement->acceptance_criteria }}</textarea>
                                  @error('acceptance_criteria')
                                    <div class="alert alert-danger">{{ $message }}
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                  @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col">
                                  <label><h5><strong>Evaluation Metrics:</strong></h5> </label>
                                  <textarea class="form-control myedittextarea" name="evaluation_metrics">{{ $nonFunctionalRequirement->evaluation_metrics }}</textarea>
                                  @error('evaluation_metrics')
                                    <div class="alert alert-danger">{{ $message }}
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                  @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col">
                                  <label><h5><strong>Upload Image:</strong></h5> </label>
                                  <input type="file" name="fileImage" id="inputFile" class="form-control @error('fileImage') is-invalid @enderror">
                                  @error('fileImage')
                                    <div class="alert alert-danger">{{ $message }}
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                  @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col">
                                  <label><h5><strong>Upload SIG File:</strong></h5> </label>
                                  <input type="file" name="fileSIG" id="inputFile" class="form-control @error('file') is-invalid @enderror">
                                  @error('fileSIG')
                                    <div class="alert alert-danger">{{ $message }}
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                  @enderror
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
     charset: 'UTF-8',
     menubar:false,
     statusbar: false,
     toolbar: 'undo redo'
   });
 </script>

@endsection