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
                <i class="fa fa-align-justify"></i>{{ __('Step 01: Levantar Requisitos Legais e Normativos') }}
              </div>
              <div class="card-body">
                <p>Esta etapa tem como objetivo identificar e analisar os requisitos legais, regulamentos, diretrizes e padrões relevantes para sistemas AAL, com foco na usabilidade e aceitabilidade. </p>

                <p>Essa documentação apresenta informações sobre o requisito legal ou normativo relevante, incluindo o nome, descrição, texto legal/referência e os requisitos não funcionais impactados por este requisito.</p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
@endsection

