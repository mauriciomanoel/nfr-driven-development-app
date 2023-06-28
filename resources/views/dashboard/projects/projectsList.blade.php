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
                      <i class="fa fa-align-justify"></i>{{ __('Projects') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('projects.create') }}" class="btn btn-primary m-2">{{ __('Add Project') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Subdomain</th>
                            <th>Date</th>
                            <!-- <th>Status</th> -->
                            <!-- <th>Note type</th> -->
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($projects as $project)
                            <tr>
                              <td><strong>{{ $project->user->name }}</strong></td>
                              <td><strong>{{ $project->title }}</strong></td>
                              <td>{{ $project->description }}</td>
                              <td>{{ $project->lifeSettings->name }}</td>

                              <td>{{ $project->created_at }}</td>
                              
                              <td>
                                <a href="{{ url('/projects/' . $project->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/projects/' . $project->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('projects.destroy', $project->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $projects->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

