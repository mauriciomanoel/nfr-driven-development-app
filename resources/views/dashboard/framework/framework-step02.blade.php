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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 02: Identificar e Análise de Stakeholders') }}</strong>
              </div>
              <div class="card-body">
              <p>Esta etapa tem como objetico identificar os diferentes stakeholders envolvidos no sistema AAL e analisar suas necessidades, expectativas e experiências em relação ao sistema.</p> 
              <p>Sua análise deve ter o foco na usabilidade e aceitabilidade, permitindo priorizar as demandas dos stakeholders e estabelecer uma comunicação efetiva ao longo do processo de desenvolvimento.</p>
              <p><strong>Saída:</strong> Lista de stakeholders relevantes e documentação das suas necessidades, expectativas e experiências relacionadas à usabilidade e aceitabilidade do sistema AAL.</p>
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
                    @foreach($stakeholders as $stakeholder)
                      <tr>
                        <td><strong>{{ $stakeholder->name }}</strong></td>
                        <td>{{ $stakeholder->description }}</td>
                        <td>{{ $stakeholder->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('framework/stakeholders/' . $stakeholder->id) }}" class="btn btn-block btn-primary">Detail</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $stakeholders->links() }}

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

