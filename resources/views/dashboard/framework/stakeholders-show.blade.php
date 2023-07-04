@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><strong>Stakeholder:</strong> {{ $stakeholder->name }}</div>
                    <div class="card-body">
                        <h5><strong>Description:</strong></h5> 
                        <p>{{ $stakeholder->analysis[0]->description }}</p>
                        <h5><strong>Identified Needs:</strong></h5> 
                        <p>{{!! html_entity_decode($stakeholder->analysis[0]->identified_needs) !!}}</p>
                        <h5><strong>Expectations:</strong></h5> 
                        <p>{{!! html_entity_decode($stakeholder->analysis[0]->expectations) !!}}</p>
                        <h5><strong>Experiences:</strong></h5> 
                        <p>{{!! html_entity_decode($stakeholder->analysis[0]->experiences) !!}}</p>
                                                
                        <h5><strong>Last Update:</strong></h5> 
                        <p>{{ $stakeholder->analysis[0]->created_at }}</p>                     
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