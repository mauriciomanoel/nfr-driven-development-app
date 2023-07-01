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
                <i class="fa fa-align-justify"></i>{{ __('Step 02: Identificar e Análise de Stakeholders') }}
              </div>
              <div class="card-body">
              <p>Esta etapa tem como objetico identificar os diferentes stakeholders envolvidos no sistema AAL e analisar suas necessidades, expectativas e experiências em relação ao sistema.</p> 
              <p>Sua análise deve ter o foco na usabilidade e aceitabilidade, permitindo priorizar as demandas dos stakeholders e estabelecer uma comunicação efetiva ao longo do processo de desenvolvimento.</p>

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

