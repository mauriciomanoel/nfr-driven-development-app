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
                <i class="fa fa-align-justify"></i><strong>{{ __('Step 3.1: Coletar Experiência dos Stakeholders') }}</strong>
              </div>
              <div class="card-body">

              <div class="row justify-content-md-center bs-wizard" style="border-bottom:0;">                        
                  @foreach($stepsFrameworkProject as $stepFrameworkProject)
                      <div class="col-xs-2 bs-wizard-step {{ $stepFrameworkProject->status }}">
                        <div class="text-center bs-wizard-stepnum">{{ $stepFrameworkProject->StepsFramework->code }}</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="{{ route('framework.step2.1') }}" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center"></div>
                      </div>
                  @endforeach                  
              </div>

              <p>Esta etapa tem como objetivo coletar informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL.</p> 
              
              <p>Para chegar ao objetivo, pode ser utilizado entrevistas, pesquisas, observações, storytelling ou outras técnicas de coleta de dados.</p> 
              
              <p><strong>Saída:</strong> O método de captura dos dados com o idoso e o planejamento de como será usado o método.</p>
              
              <br>
              <h2>Sugestões de técnicas para coleta de dados:</h2>
              <br>

              <form method="POST" action="{{ route('framework.step3.confirmDataCollectionTechniques') }}">
                    @csrf
              <div class="card-group">
                <div class="col-sm-3">
      
                  <div class="card" id="btn-interviews" style="cursor: pointer">
                    <div class="card-body bg-light">
                      <h5 class="card-title text-center">Entrevistas</h5>
                      <p class="card-text">Como os usuários finais são idosos, realizar entrevistas individuais ou em grupo pode ser uma maneira eficaz de coletar informações detalhadas sobre suas necessidades, expectativas e experiências. As entrevistas permitem explorar as preocupações específicas de cada usuário, entender sua experiência com tecnologia e obter feedback direto sobre a usabilidade e a aceitabilidade do sistema AAL.</p>
                      <p>&nbsp;</p><br>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="card" id="btn-researches" style="cursor: pointer">
                    <div class="card-body bg-light">
                      <h5 class="card-title text-center">Questionários</h5>
                      <p class="card-text">A realização de pesquisas pode ser útil para coletar dados quantitativos e obter uma visão mais abrangente das necessidades e preferências dos usuários finais. As pesquisas podem ser projetadas para incluir perguntas fechadas, como escalas de classificação e perguntas de escolha múltipla, para medir a importância de diferentes recursos e identificar preferências gerais. Além disso, podem incluir perguntas abertas para permitir que os usuários compartilhem suas opiniões e sugestões.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="card" id="btn-observations" style="cursor: pointer">
                    <div class="card-body bg-light">
                      <h5 class="card-title text-center">Observações</h5>
                      <p class="card-text">Observar os usuários finais interagindo com o sistema AAL em seu ambiente natural pode fornecer insights valiosos sobre o uso real do sistema e identificar possíveis problemas de usabilidade. As observações podem revelar desafios específicos enfrentados pelos usuários durante o uso do sistema, bem como suas reações e comportamentos em relação às funcionalidades. Essa abordagem pode ser combinada com entrevistas para obter uma compreensão mais completa das experiências dos usuários.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="card bg-light">
                    <div class="card-body" id="btn-storytelling" style="cursor: pointer">
                      <h5 class="card-title text-center">Storytelling</h5>
                      <p class="card-text">O storytelling pode ser uma técnica complementar para coletar informações qualitativas e obter insights mais profundos sobre as experiências, necessidades e expectativas dos usuários finais. Encorajar os usuários a compartilharem histórias e exemplos específicos de como o sistema AAL afeta sua vida cotidiana pode fornecer um entendimento mais rico e ajudar a identificar áreas de melhoria. Essa abordagem pode ser realizada por meio de entrevistas estruturadas ou em formatos mais informais, como grupos focais.</p>
                    </div>
                  </div>
                </div>     
              </div>
              <div id="interviews-details" class="collapse1" style="display: none;">

                <ul>

                  <li><p>Realize entrevistas individuais para permitir que cada idoso se sinta confortável e à vontade para compartilhar suas experiências e opiniões.</p></li>
                  <li><p>Prepare um roteiro de perguntas abertas que aborde tópicos como familiaridade com tecnologia, necessidades de suporte diário, preocupações com privacidade e segurança, experiências anteriores com sistemas similares, expectativas em relação ao sistema AAL e feedback sobre a interface do usuário.</p></li>
                  <li><p>Use uma abordagem empática e encoraje os idosos a compartilharem exemplos concretos de como o sistema pode melhorar sua vida diária.</p></li>
                  <li><p>Considere a possibilidade de realizar entrevistas remotas para facilitar a participação dos idosos e garantir sua comodidade.</p></li>

                </ul>
              </div>
              <div id="researches-details" class="collapse1" style="display: none;">
                <ul>                  
                <li><p>Projete uma pesquisa online com perguntas de escolha múltipla, escalas de classificação e questões abertas..</p></li>
                  <li><p>Inclua perguntas sobre a importância de diferentes recursos do sistema AAL, preferências de interface, níveis de conforto com a tecnologia, preferências de comunicação com cuidadores e familiares, e níveis de confiança em relação à privacidade dos dados..</p></li>
                  <li><p>Adapte o formato e a linguagem da pesquisa para garantir que seja acessível e compreensível para os idosos. Use fontes legíveis, evite termos técnicos complicados e forneça instruções claras..</p></li>
                  <li><p>Divulgue a pesquisa em locais frequentados por idosos, como centros comunitários, residências para a terceira idade e organizações voltadas para a terceira idade.</p></li>
                </ul>
              </div>
              <div id="observations-details" class="collapse1" style="display: none;">
                <ul>                  
                <li><p>Realize observações no ambiente natural dos idosos, como em suas casas ou em ambientes onde eles interagem com o sistema AAL.</p></li>
                <li><p>Registre o uso do sistema, anotando os desafios encontrados, as reações emocionais, as interações com a interface e quaisquer insights relevantes.</p></li>
                <li><p>Considere a possibilidade de fazer anotações visuais ou gravar vídeo para capturar as expressões faciais, gestos e interações dos idosos.</p></li>
                <li><p>Seja respeitoso e discreto durante as observações, garantindo a privacidade dos idosos e obtendo seu consentimento informado.</p></li>
                </ul>
              </div>
              <div id="storytelling-details" class="collapse1" style="display: none;">
                  <ul>                  
                    <li><p>Realize observações no ambiente natural dos idosos, como em suas casas ou em ambientes onde eles vão interagir com o sistema AAL.</p></li>
                    <li><p>Registre o uso do sistema, anotando os desafios encontrados, as reações emocionais, as interações com a interface e quaisquer insights relevantes.</p></li>

                    <li><p>Seja respeitoso e discreto durante as observações, garantindo a privacidade dos idosos e obtendo seu consentimento informado.</p></li>

                    <li><p>Considere a possibilidade de fazer anotações visuais ou gravar vídeo para capturar as expressões faciais, gestos e interações dos idosos.</p></li>

                    <li><p>Estabelecer uma conexão empática: Crie um ambiente acolhedor e encorajador, onde os idosos se sintam à vontade para compartilhar suas histórias. Mostre interesse genuíno em suas experiências e demonstre empatia em relação às suas preocupações e desafios.</p></li>

                    <li><p>Utilizar uma abordagem centrada no idoso: Permita que os idosos liderem o processo de storytelling, dando-lhes espaço para compartilharem suas histórias de forma livre e espontânea. Evite interrupções e dê tempo suficiente para que expressem suas experiências de maneira completa.</p></li>

                    <li><p>Fazer perguntas abertas: Incentive os idosos a fornecerem detalhes e exemplos específicos em suas histórias. Faça perguntas abertas que os estimulem a descrever situações e eventos que enfatizem as atividades de suas vidas cotidianas.</p></li>

                    <li><p>Criar um ambiente de confiança: Garanta aos idosos que suas histórias serão tratadas com confidencialidade e respeito. Transmita a importância de suas contribuições para o desenvolvimento do sistema AAL e assegure que suas opiniões são valorizadas.</p></li>

                    <li><p>Facilitar a expressão emocional: Reconheça que as histórias podem conter elementos emocionais e permita que os idosos expressem seus sentimentos durante o processo de storytelling. Isso pode ajudar a obter insights mais profundos sobre suas necessidades, expectativas e experiências emocionais.</p></li>

                    <li><p>Documentar e analisar as histórias: Grave ou registre as histórias compartilhadas pelos idosos, para garantir que as informações sejam capturadas de forma precisa. Após o processo de storytelling, analise as histórias coletadas para identificar padrões, temas recorrentes e necessidades específicas que possam direcionar o desenvolvimento e aprimoramento do sistema AAL.</p></li>

                  </ul>
              </div>

              <button class="btn btn-block {{ $isEnableNextStep ? "btn-primary" : "btn-secondary" }}" type="submit" {{ $isEnableNextStep ? "" : "disabled" }}>{{ __('Save and Advance to the next phase') }}</button>
                @if (!$isEnableNextStep)
                    <div class="disabled-explanation text-center">
                        {{ __('This button is disabled because you need to confirm the previous step to execute this step.') }}
                    </div>
                @endif
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('javascript')

<script type="text/javascript">
   
  $(document).ready(function(){
    $('.collapse1').hide();
    $('#btn-interviews').click(function(){     
       $('.collapse1').hide();
       $("btn-interviews").css("background-color", "yellow");
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

<link href="{{ asset('css/process-steps.css') }}" rel="stylesheet">

@endsection

