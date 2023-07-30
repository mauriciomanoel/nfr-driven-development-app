@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $values["nonFunctionalRequirementCount"] }}</div>
                      <div>Non-Functional Requirements</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:50px;">
                      <canvas class="chart" id="card-chart1" height="50"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->            
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $values["legalAndNormativeRequirementCount"] }}</div>
                      <div>Legal Regulations</div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:50px;">
                      <canvas class="chart" id="card-chart3" height="50"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $values["sigCount"] }}</div>
                      <div>SIG Tree</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:50px;">
                      <canvas class="chart" id="card-chart4" height="50"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $values["countProject"] }}</div>
                      <div>Projects</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:50px;">
                      <canvas class="chart" id="card-chart2" height="50"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->

              <!-- /.row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">My Projects</div>
                    <div class="card-body">

                      <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                          <tr>
                            <!-- <th>Author</th> -->
                            <th>Title</th>
                            <th>Description</th>
                            <th>Life Setting</th>
                            <th>Date</th>
                            <!-- <th>Status</th> -->
                            <!-- <th>Note type</th> -->
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($projects as $project)
                            <tr>
                              <!-- <td><strong>{{ $project->user->name }}</strong></td> -->
                              <td><strong>{{ $project->title }}</strong></td>
                              <td>{{ $project->description }}</td>
                              <td>{{ $project->lifeSettings->name }}</td>

                              <td>{{ $project->created_at }}</td>
                              
                              <td>
                                <a href="{{ url('/projects/' . $project->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>                            
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <br>
                      {{ $projects->links() }}                      
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
            </div>
          </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
