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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 04: Definir Requisitos não Funcionais') }}</strong>
              </div>
              <div class="card-body">
              <p>Com base nos requisitos legais e normativos identificados, bem como nas informações coletadas sobre a experiência dos stakeholders, os requisitos não funcionais relacionados à usabilidade e aceitabilidade do sistema AAL são definidos</p>
              <p><strong>Saída:</strong>Documentação dos requisitos não funcionais específicos relacionados à usabilidade e aceitabilidade do sistema AAL.</p>
                </br>
                <h2><strong>Recommendations Non-Functional Requirements</strong></h2>
                <p>NFR recommendations based on previous steps</p>

                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>Select</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nonFunctionalRequirements as $nonFunctionalRequirement)
                      <tr>
                        <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                        <td><strong>{{ $nonFunctionalRequirement->name }}</strong></td>
                        <td>{{ $nonFunctionalRequirement->description }}</td>
                        <td>{{ $nonFunctionalRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('/nonFunctionalRequirement/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <h3><strong>All the Non-Functional Requirements</strong></h3>
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <!-- <th>Author</th> -->
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <th colspan="3" class="text-center">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nonFunctionalRequirements as $nonFunctionalRequirement)
                      <tr>
                        <td><strong>{{ $nonFunctionalRequirement->name }}</strong></td>
                        <td>{{ $nonFunctionalRequirement->description }}</td>
                        <td>{{ $nonFunctionalRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('/nonFunctionalRequirement/' . $nonFunctionalRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>


                {{ $nonFunctionalRequirements->links() }}
                            
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

