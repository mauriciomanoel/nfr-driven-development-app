@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>Legal Requirement:</strong> {{ $legalRequirements->name }}</div>
                    <div class="card-body">
                        <h5><strong>Author:</strong></h5>
                        <p> {{ $legalRequirements->user->name }}</p>
                        <h5><strong>Name:</strong></h4>
                        <p> {{ $legalRequirements->name }}</p>
                        <h5><strong>Description:</strong></h5> 
                        <p>{{ $legalRequirements->description }}</p>
                        <h5><strong>Legal Text/Reference:</strong></h5> 
                        <p>{!! html_entity_decode($legalRequirements->legal_references) !!}</p>
                        <h5><strong>Recommendations:</strong></h5> 
                        <p>{!! html_entity_decode($legalRequirements->recommendations) !!}</p>
                        
                        <h5><strong>Non-Functional Requirements:</strong></h5> 
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
                            @foreach($legalRequirements->nonFunctionRequeriments as $nonFunctionalRequirement)
                                <tr>
                                  <td><strong>{{ $nonFunctionalRequirement->name }}</strong></td>
                                  <td>{{ $nonFunctionalRequirement->description }}</td>                                
                                  <td>
                                    <a href="{{ url('/nonFunctionalRequirements/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                                  </td>                                
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </p>
                        <h5><strong>Last Update:</strong></h5> 
                        <p>{{ $legalRequirements->created_at }}</p>                     
                        <a href="{{ url()->previous() }}" class="btn btn-block btn-primary">{{ __('Go Back') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection