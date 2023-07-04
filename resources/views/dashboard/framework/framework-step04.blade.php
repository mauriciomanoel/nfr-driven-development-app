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
              <p><strong>Saída:</strong> Documentação dos requisitos não funcionais específicos relacionados à usabilidade e aceitabilidade do sistema AAL.</p>


                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <!-- <th>Author</th> -->
                      <th>Name</th>
                      <th>Description</th>
                      <th>Last Update</th>
                      <!-- <th>Status</th> -->
                      <!-- <th>Note type</th> -->
                      <th colspan="3" class="text-center">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($legalAndNormativeRequirements as $legalAndNormativeRequirement)
                      <tr>
                        <td><strong>{{ $legalAndNormativeRequirement->name }}</strong></td>
                        <td>{{ $legalAndNormativeRequirement->description }}</td>
                        <td>{{ $legalAndNormativeRequirement->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('/legalAndNormativeRequirements/' . $legalAndNormativeRequirement->id) }}" class="btn btn-block btn-primary">View</a>
                        </td>
                        <!--<td>
                          <a href="{{ url('/legalAndNormativeRequirements/' . $legalAndNormativeRequirement->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('legalAndNormativeRequirements.destroy', $legalAndNormativeRequirement->id ) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-block btn-danger">Delete</button>
                          </form>
                        </td> -->
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $legalAndNormativeRequirements->links() }}
                            
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

