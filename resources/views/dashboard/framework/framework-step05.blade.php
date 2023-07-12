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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 05: Especificar os Requisitos não Funcionais') }}</strong>
              </div>
              <div class="card-body">

                <p>Os requisitos não funcionais são especificados de forma clara e precisa, fornecendo operacionalizações e justificativas (Claim) nas operacionalizações sobre cada requisito não funcional entre outros elementos relevantes.<p> 
                <p><strong>Saída:</strong> Documentação detalhada (SIG) dos requisitos não funcionais especificados.</p>
              
                
                <p><a href=" " class="btn btn-primary btn-block" data-toggle="button" aria-pressed="true">Download Documents</a></p>
                <p><a href=" " class="btn btn-primary btn-block" data-toggle="button" aria-pressed="true">Download All SIG File</a></p>


                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Recomentation</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nonFunctionalRequirements as $nonFunctionalRequirement)
                      <tr>
                        <td><strong>{{ $nonFunctionalRequirement->nonFunctionalRequirement->name }}</strong></td>
                        <td>{{ $nonFunctionalRequirement->nonFunctionalRequirement->description }}</td>
                        <td>{{ $nonFunctionalRequirement->is_recommendation }}</td>
                        <td>{{ $nonFunctionalRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('/nonFunctionalRequirement/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-info">Download SIG File</a>
                        </td>
                        <td>
                          <a href="{{ url('/nonFunctionalRequirement/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-info">View Document</a>
                        </td>
                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>                            
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

