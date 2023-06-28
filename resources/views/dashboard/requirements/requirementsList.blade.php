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
                      <i class="fa fa-align-justify"></i>{{ __('Requirements') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('requirements.create') }}" class="btn btn-primary m-2">{{ __('Add Requirement') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Author</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Model Quality</th>
                            <th>Date</th>
                            <!-- <th>Status</th> -->
                            <!-- <th>Note type</th> -->
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($requirements as $requirement)
                            <tr>
                              <td><strong>{{ $requirement->user->name }}</strong></td>
                              <td><strong>{{ $requirement->name }}</strong></td>
                              <td>{{ $requirement->description }}</td>
                              <td>{{ $requirement->model_quality }}</td>
                              <td>{{ $requirement->created_at }}</td>
                              
                              <td>
                                <a href="{{ url('/requirements/' . $requirement->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/requirements/' . $requirement->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('requirements.destroy', $requirement->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $requirements->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

