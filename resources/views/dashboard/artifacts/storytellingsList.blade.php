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
                      <i class="fa fa-align-justify"></i>{{ __('Storytellings') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('projects.create') }}" class="btn btn-primary m-2">{{ __('Add Artifact') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Life Settings</th>
                            <th></th>
                            <!-- <th>Note type</th> -->

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($artifacts as $artifact)
                            <tr>
                              <td><strong>{{ $artifact->user->name }}</strong></td>
                              <td><strong>{{ $artifact->title }}</strong></td>
                              <td>{{ $artifact->lifeSettingsSubcatetory->category->lifeSettings->name }}</td>
                              <td>
                                <a href="{{ url('/artifacts/' . $artifact->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $artifacts->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

