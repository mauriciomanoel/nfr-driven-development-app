@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>Non-Function Requirement:</strong> {{ $nonFunctionalRequirement->name }}</div>
                    <div class="card-body">
                        <h5><strong>Author:</strong></h5>
                        <p> {{ $nonFunctionalRequirement->user->name }}</p>
                        <h5><strong>Name:</strong></h4>
                        <p> {{ $nonFunctionalRequirement->name }}</p>
                        <h5><strong>Description:</strong></h5> 
                        <p>{{ $nonFunctionalRequirement->description }}</p>
                        <h5><strong>Model Quality:</strong></h5> 
                        <p>{{ $nonFunctionalRequirement->model_quality }}</p>
                        <h5><strong>Recommendations:</strong></h5> 
                        <p>{!! html_entity_decode($nonFunctionalRequirement->recommendations) !!}</p>
                        <h5><strong>Source:</strong></h5> 
                        <p>{!! html_entity_decode($nonFunctionalRequirement->source) !!}</p>
                        
                        <h5><strong>Legal/Normative Requirements:</strong></h5> 
                        <p>                        
                          <table class="table table-responsive-sm table-striped">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Description</th>                              
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($legalAndNormativeRequirements as $legalAndNormativeRequirement)
                                <tr>
                                  <td><strong>{{ $legalAndNormativeRequirement->name }}</strong></td>
                                  <td>{{ $legalAndNormativeRequirement->description }}</td>                                
                                  <td>
                                    <a href="{{ url('/legalRequirements/' . $legalAndNormativeRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                                  </td>                                
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </p>
                        <h5><strong>Image:</strong></h5>
                        <p>
                          <a href="{{route('download.sig',$nonFunctionalRequirement->id)}}" download=""><strong>Click Here</strong></a> to download Softgoal Interdependency Graph (SIG)
                          and Open in <a href="https://www.cin.ufpe.br/~jhcp/dsm3goals/nfr.html#">DSM3 - NFR</a>
                        </p>                          
                        <p>  
                          <img src="{{ $nonFunctionalRequirement->image }}" width="60%" alt="Softgoal Interdependency Graph (SIG)" />
                        </p>
                        <h5><strong>Last Update:</strong></h5> 
                        <p>{{ $nonFunctionalRequirement->created_at }}</p>
                        <a href="{{ url()->previous() }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection