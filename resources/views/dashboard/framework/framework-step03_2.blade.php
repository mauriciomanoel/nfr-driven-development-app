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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 3.2: Coletar Experiência dos Stakeholders') }}</strong>
              </div>
              <div class="card-body">

                <p>Esta etapa tem como descrever o que foi coletado de informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL.</p> 
                              
                <p><strong>Saída:</strong> Dados e insights obtidos a partir das atividades de coleta de experiência dos stakeholders.</p>
              
              
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
                    @foreach($stakeholderExperiencies as $stakeholderExperience)
                      <tr>
                        <td><strong>{{ $stakeholderExperience->stakeholders->name }}</strong></td>
                        <td>{{ $stakeholderExperience->description }}</td>
                        <td>{{ $stakeholderExperience->updated_at }}</td>                        
                        <td>
                          <a href="{{ url('framework/stakeholders/experiencies/' . $stakeholderExperience->id) }}" class="btn btn-block btn-primary">Detail</a>
                        </td>                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $stakeholderExperiencies->links() }}

              </div>


          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
<link href="{{ asset('css/bootstrap-3.1.0.css') }}" rel="stylesheet">

<script type="text/javascript">
   

  $(document).ready(function(){
    $('.collapse1').hide();
    $('#btn-interviews').click(function(){     
       $('.collapse1').hide();
      $('#interviews-details').show();
    });

    $('#btn-researches').click(function(){     
       $('.collapse1').hide();
      $('#researches-details').show();
    });

    $('#btn-observations').click(function(){     
       $('.collapse1').hide();
      $('#observations-details').show();
    });

    $('#btn-storytelling').click(function(){     
       $('.collapse1').hide();
      $('#storytelling-details').show();
    });

  })
</script>



@endsection

