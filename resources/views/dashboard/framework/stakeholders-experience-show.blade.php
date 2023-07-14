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
                        <h5><strong>Description:</strong></h5> 
                        <p>{{ $stakeholderExperience->description }}</p>
                        <h5><strong>Factors That Impact Acceptability:</strong></h5> 
                        <p>{!! html_entity_decode($stakeholderExperience->factors_that_impact_acceptability) !!}</p>
                        <h5><strong>Factors That Impact Usability:</strong></h5> 
                        <p>{!! html_entity_decode($stakeholderExperience->factors_that_impact_usability) !!}</p>
                        <h5><strong>Proposed Improvements:</strong></h5> 
                        <p>{!! html_entity_decode($stakeholderExperience->proposed_improvements) !!}</p>
                        <h5><strong>Recommendations:</strong></h5> 
                        <p>{!! html_entity_decode($stakeholderExperience->recommendations) !!}</p>
                                                
                        <h5><strong>Last Update:</strong></h5> 
                        <p>{{ $stakeholderExperience->updated_at }}</p>                     
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