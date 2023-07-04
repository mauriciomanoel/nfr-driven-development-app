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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 03: Coletar Experiência dos Stakeholders') }}</strong>
              </div>
              <div class="card-body">

              <p>Esta etapa tem como objetivo coletar informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL.</p> 
              
              <p>Para chegar ao objetivo, pode ser utiizado entrevistas, questionários, storytelling ou outras técnicas de coleta de dados.</p> 
              
              <p><strong>Saída:</strong> Dados e insights obtidos a partir das atividades de coleta de experiência dos stakeholders.</p>
              
              
              <br>
              <h2>Técnicas para coleta de dados com base na etapa anterior:</h2>
              <p>Entrevistas</p>
              <p>Observações</p>
              <p>Storytelling</p>
              
                            
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

