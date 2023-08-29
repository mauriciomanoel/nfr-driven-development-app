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
                        <h5><strong>Description:</strong></h5> 
                        <p>{!! html_entity_decode($nonFunctionalRequirement->description) !!}</p>
                        <h5><strong>Acceptance Criteria:</strong></h5> 
                        <p>{!! html_entity_decode($nonFunctionalRequirement->acceptance_criteria) !!}</p>
                        <h5><strong>Evaluation Metrics:</strong></h5> 
                        <p>{!! html_entity_decode($nonFunctionalRequirement->evaluation_metrics) !!}</p>
                        <h5><strong>Image:</strong></h5>
                        @if(!empty($nonFunctionalRequirement->image))
                          <p>
                            <a href="{{route('framework.download.sig.especification',$nonFunctionalRequirement->id)}}" download=""><strong>Click Here</strong></a> to download Softgoal Interdependency Graph (SIG)
                            and Open in <a href="https://www.cin.ufpe.br/~jhcp/dsm3goals/nfr.html#">DSM3 - NFR</a>
                          </p>
                          <p>  
                            <img src="{{ $nonFunctionalRequirement->image }}" width="60%" alt="Softgoal Interdependency Graph (SIG)" />
                          </p>
                          @else
                           <p>NFR without image or SIG file</p>
                        @endif
                        <h5><strong>Last Update:</strong></h5> 
                        <p>{{ $nonFunctionalRequirement->updated_at }}</p>                     
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