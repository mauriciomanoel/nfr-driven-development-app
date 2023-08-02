@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create Project') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Life Settings</label>
                                <select class="form-control" id="subdomains" name="subdomains_id" required>
                                   <option value="">Select a Life Setting</option>
                                    @foreach($subdomains as $subdomain)
                                        <option value="{{ $subdomain->id }}">{{ $subdomain->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="list-" role="tabpanel"><p></p></div>
                                @foreach($subdomains as $subdomain)
                                    <div class="tab-pane fade" id="list-{{ $subdomain->id }}" role="tabpanel">
                                      <p>{{ $subdomain->description }}</p>
                                    </div>
                                @endforeach

                              </div>
                            </div>
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-block btn-primary">{{ __('Go Back') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

<script> 
  $('#subdomains').on('change', function(e) {
      var id = $(this).val();
      
      $(".tab-pane").removeClass("active show");
      $('#list-' + id).addClass(" active show");
  });
</script>

@endsection