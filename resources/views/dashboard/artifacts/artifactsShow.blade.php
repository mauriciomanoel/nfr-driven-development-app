@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Artifact</div>
                    <div class="card-body">
                        <h5>Title:</h4>
                        <p> {{ $artifact->title }}</p>
                        <h5>Content:</h5> 
                        <p>{{ $artifact->content }}</p>
                        <h5>Life Settings:</h5> 
                        <p>{{ $artifact->lifeSettingsSubcatetory->category->lifeSettings->name }}</p>
                        <h5>Author:</h5>
                        <p> {{ $artifact->user->name }}</p>
                        <h5>Date:</h5> 
                        <p>{{ $artifact->created_at }}</p>
                        <h5>Relationships:</h5> 


                        <!-- /.col-->
                        <div class="card">
                          <div class="card-header">Non-Function Requeriments</div>
                          <div class="card-body">
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Is the software capability to modify its own behaviour in response to changes in its operating environment (i.e., anything observable by the software system, such as end-user input, external hardware devices and sensors, or program instrumentation). Font: P. Oreizy et al., An architecture-based approach to self-adaptive software, in IEEE Intelligent Systems and their Applications, vol. 14, no. 3, pp. 54-62, May-June 1999, doi: 10.1109/5254.769885.">Adaptivity</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Privacy</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Learnability</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Flexibility</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Effectiveness</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Usefulness</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">User comfort</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">User Efficiency</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Energy Efficiency</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Usability</a>

                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header">Personal Context</div>
                          <div class="card-body">
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Location</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Urgent Tasks</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Temperature</a>,
                            <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Natural light</a>

                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header">SIG Tree</div>
                          <div class="card-body">
                              <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Modeling Usability for Authentication</a>,
                              <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Modeling Luminosity Control</a>,
                              <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">Modeling User Positioning</a>
                          </div>
                        </div>

                                   
                        <a href="{{ route('notes.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')
    <script src="{{ asset('js/tooltips.js') }}"></script>
@endsection