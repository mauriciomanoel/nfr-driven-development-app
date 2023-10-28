<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use App\Models\Projects;
use App\Models\StepsFrameworkProject;
use App\Models\LegalRequirements;
use App\Models\StepsFramework;
use App\Models\Steps1Framework;
use App\Models\Steps2Framework;
use App\Models\Steps31Framework;
use App\Models\Steps32Framework;
use App\Models\Stakeholders;
use App\Models\DataCollectionTechniques;
use App\Models\NonFunctionalRequirements;
use App\Models\Steps5Framework;


class FrameworkStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $project = Projects::where('title',"Sistema de Gestão de Saúde")->first();
        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 1)->first();
        $legalRequirements = LegalRequirements::whereIn('id', [1,2])->get();

        foreach($legalRequirements as $legalRequirement) {
            $steps1Framework = new Steps1Framework();
            $steps1Framework->legal_requirements_id = $legalRequirement->id;
            $steps1Framework->steps_framework_project_id = $currentStep->id;
            $steps1Framework->save();
        }
        $this::setCompleteStatusStep(1, $project);

        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 1)->first();
        $stakeholder = Stakeholders::where("name", "=", "Idosos")->first();

        $steps2Framework = new Steps2Framework();
        $steps2Framework->stakeholder_id = $stakeholder->id;
        $steps2Framework->steps_framework_project_id = $currentStep->id;
        $steps2Framework->identified_needs = "<p>Monitoramento remoto de saúde e bem-estar.</p><p>Suporte para atividades diárias, como lembretes de medicação e assistência na realização de tarefas domésticas.</p><p>Comunicação fácil com cuidadores e familiares.</p><p>Interface intuitiva e de fácil uso, considerando as habilidades digitais variadas dos usuários.</p><p>Privacidade e segurança dos dados pessoais.</p><p>Treinamento para o uso do sistema Android</p>";
        $steps2Framework->expectations = "<p>Acesso fácil e rápido às funcionalidades do sistema.</p><p>Disponibilidade de suporte técnico para solucionar eventuais problemas.</p><p>Interface de usuário amigável, com ícones claros e texto legível.</p><p>Funcionalidades adaptáveis e personalizáveis para atender às preferências individuais.</p><p>Alertas e notificações claras e compreensíveis.</p>";
        $steps2Framework->experiences = "<p>Alguns usuários finais não tem experiência com tecnologia, mais utilizam com frequencia a plataforma de stream para assistir os canais favoritos, enquanto outros têm maior familiaridade com dispositivos eletrônicos.</p>";
        $steps2Framework->save();

        $this::setCompleteStatusStep(2, $project);
        $this::setCompleteStatusStep(3, $project);

        $dataCollectionTechniques = DataCollectionTechniques::where("name", "like", "Storytelling")->first();
        $steps31Framework = new Steps31Framework();
        $steps31Framework->data_collection_technique_id = $dataCollectionTechniques->id;
        $steps31Framework->project_id = $project->id;
        $steps31Framework->save();
        $this::setCompleteStatusStep(4, $project);


        $currentStep = StepsFrameworkProject::where("project_id", "=", $project->id)->where("steps_framework_id", "=", 5)->first();
        $steps32Framework = new Steps32Framework();
        $steps32Framework->steps_framework_project_id = $currentStep->id;
        $steps32Framework->description = "<p>Esta documentação apresenta os resultados da etapa de coleta de experiência dos stakeholders para o sistema AAL. Através de entrevistas individuais, questionários e grupos focais, foram coletadas informações valiosas sobre a usabilidade e aceitabilidade do sistema, de acordo com as perspectivas dos stakeholders envolvidos. A análise dos dados permitiu a identificação de insights significativos que podem orientar melhorias e ajustes no sistema AAL</p>";
        $steps32Framework->stakeholder_id = $stakeholder->id;
        $steps32Framework->factors_impact_acceptability = "<p>Facilidade de uso: O idoso de 75 anos mencionou a importância da simplicidade e facilidade de uso do sistema AAL. Se o sistema for complexo ou difícil de entender e operar, pode afetar negativamente sua aceitabilidade.</p>
        <p>Intuitividade: O idoso valoriza a intuição no uso do sistema, ou seja, a capacidade de entender e interagir com o sistema de forma natural, sem a necessidade de instruções complicadas.</p>
        <p>Necessidades individuais: O idoso destaca a importância de o sistema atender às suas necessidades específicas. Isso pode incluir recursos personalizados para lidar com as limitações físicas, preferências de comunicação ou outras necessidades particulares relacionadas à sua saúde e bem-estar.</p>
        <p>Confiança e segurança: O idoso mencionou que se sentir seguro e confiante ao usar o sistema é essencial para adotá-lo. Questões de privacidade e segurança dos dados também podem ser mencionadas.</p>
        <p>Suporte técnico e treinamento: O idoso enfatiza a importância de receber suporte técnico adequado e treinamento para usar o sistema AAL. Se houver dificuldades no aprendizado ou na resolução de problemas, isso pode impactar sua aceitabilidade.</p>";
        $steps32Framework->factors_impact_usability = "<p>Interface intuitiva: O idoso mencionou a importância de uma interface intuitiva e fácil de entender. Ícones claros, navegação simplificada e menus organizados contribuem para a usabilidade do sistema AAL.</p>
        <p>Instruções claras: O idoso enfatizou a necessidade de instruções claras e simples para operar o sistema.</p>
        <p>Orientações passo a passo, exemplos práticos e documentação de fácil compreensão podem melhorar a usabilidade do sistema.</p>
        <p>Feedback imediato: O idoso valoriza a presença de feedback sonoro imediato ao realizar ações no sistema AAL. Isso pode incluir notificações visuais, sonoras ou táteis que confirmem que a ação foi executada com sucesso.</p>
        <p>Tamanho de fonte ajustável: O idoso valoriza a possibilidade de ajustar o tamanho da fonte no sistema AAL. Isso permite que ele personalize a legibilidade da informação de acordo com suas necessidades visuais.</p>
        <p>Facilidade de configuração: O idoso mencionou a importância de uma configuração inicial fácil e rápida do sistema. Se a configuração for complicada e demorada, pode causar frustração e diminuir a usabilidade do sistema.</p>";
        $steps32Framework->proposed_improvements = "<p>Vários stakeholders sugeriram a inclusão de recursos de comunicação mais avançados, como videochamadas, para melhorar a interação social dos usuários.</p>
        <p>Foi destacada a importância de personalização e adaptação do sistema às necessidades individuais dos usuários, considerando diferentes perfis e preferências.</p>
        <p>Foi sugerido a inclusão de tutoriais interativos no sistema AAL, que guiem o usuário passo a passo nas principais funcionalidades e recursos do sistema.</p>
        <p>Foi destacado a importância de ter um suporte técnico adequado para solucionar dúvidas e problemas que possam surgir durante a utilização do sistema AAL.</p>";
        $steps32Framework->recommendations = "<p>Aprimorar a orientação inicial: Desenvolver um processo de configuração mais intuitivo e fornecer orientações claras para facilitar a configuração inicial do sistema.</p>
        <p>Reforçar a privacidade e segurança: Implementar medidas adicionais de segurança de dados e fornecer informações transparentes aos stakeholders para aumentar a confiança no sistema.</p>
        <p>Ampliar recursos de comunicação: Considerar a inclusão de recursos de videochamada e outras formas avançadas de comunicação para melhorar a interação social e o bem-estar dos usuários.</p>
        <p>Realizar sessões de treinamento: O idoso pode sugerir a realização de sessões de treinamento presenciais ou online para ajudar na familiarização e no uso adequado do sistema AAL.</p>
        <p>Simplificar a interface: O idoso pode sugerir a simplificação da interface do sistema AAL, removendo elementos desnecessários e mantendo apenas as funcionalidades mais importantes e relevantes para os usuários finais.</p>
        <p>Realizar testes de usabilidade com idosos: O idoso sugeriu que sejam realizados testes de usabilidade específicos com pessoas da mesma faixa etária para identificar e corrigir possíveis obstáculos e desafios relacionados à usabilidade do sistema.</p>";
        $steps32Framework->save();
       

        $nonFunctionalRequirements = NonFunctionalRequirements::where("name", "like", 'Acceptability')->first();
        $nfrForSpecification = new Steps5Framework();
        $nfrForSpecification->project_id = $project->id;
        $nfrForSpecification->users_id = 1;
        $nfrForSpecification->is_recommendation = 1;
        $nfrForSpecification->nfr_id = $nonFunctionalRequirements->id;
        $nfrForSpecification->description = "<p>A aceitabilidade é um requisito não funcional crucial para sistemas AAL, pois determina o grau de satisfação e aprovação dos usuários finais em relação à tecnologia assistiva. O objetivo é garantir que o sistema seja bem recebido, atenda às expectativas dos usuários e seja integrado facilmente em suas rotinas diárias.</p>";
        $nfrForSpecification->acceptance_criteria = "<p>Facilidade de Uso: Os stakeholders devem conseguir interagir e utilizar o sistema AAL de forma intuitiva, mesmo aqueles com pouca experiência em tecnologia, considerando que a curva de aprendizado deve ser mínima, permitindo que os usuários compreendam rapidamente as funcionalidades e comandos do sistema.</p>
        <p>Adaptabilidade: O sistema AAL deve ser configurável e adaptável para atender às preferências individuais dos usuários, considerando personalização de interface, ajuste de parâmetros e suporte a diferentes perfis de usuário.</p>
        <p>Segurança e Privacidade: Os stakeholders devem sentir-se confiantes de que seus dados pessoais estão protegidos e que o sistema AAL opera de forma segura, utilizando a comunicação de dados criptografada e respeitada em todos os momentos a privacidade.</p>
        <p>Eficácia: O sistema AAL deve demonstrar um desempenho eficaz no suporte às atividades diárias dos usuários, proporcionando resultados positivos e melhorando a qualidade de vida dos mesmos.</p>";
        $nfrForSpecification->evaluation_metrics = "<p>Taxa de Adoção: Medir a proporção de stakeholders que efetivamente adotaram o sistema AAL em suas rotinas diárias. Quanto maior a taxa de adoção, maior a aceitação do sistema.</p>
        <p>Tempo de Aprendizado: Avaliar o tempo médio necessário para que os usuários aprendam a utilizar as funcionalidades principais do sistema AAL. Quanto menor o tempo de aprendizado, mais aceitável o sistema é considerado.</p>
        <p>Satisfação do Usuário: Coletar a opinião dos usuários sobre o sistema AAL por meio de pesquisas ou questionários de satisfação. Uma alta taxa de satisfação indica uma maior aceitabilidade do sistema.</p>
        <p>Número de Erros e Problemas: Registrar a quantidade de erros ou problemas enfrentados pelos usuários durante o uso do sistema AAL. Menos problemas podem indicar maior aceitabilidade.</p>
        <p>Efetividade das Funcionalidades: Avaliar a eficácia das funcionalidades do sistema AAL em auxiliar os usuários em suas atividades diárias. Quanto mais efetivo o sistema, maior a sua aceitação.</p>
        <p>Feedback dos Usuários: Analisar o feedback direto dos usuários, seja por meio de avaliações, comentários ou relatórios de bugs. O feedback positivo é um indicativo de maior aceitabilidade.</p>";
        $nfrForSpecification->content = file_get_contents(storage_path() . '/files/nfr/sig-acceptability-file.txt');
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(storage_path() . '/files/nfr/sig-acceptability-file.png'));
        $nfrForSpecification->save();


        $nonFunctionalRequirements = NonFunctionalRequirements::where("name", "like", 'Usability')->first();
        $nfrForSpecification = new Steps5Framework();
        $nfrForSpecification->project_id = $project->id;
        $nfrForSpecification->users_id = 1;
        $nfrForSpecification->is_recommendation = 1;
        $nfrForSpecification->nfr_id = $nonFunctionalRequirements->id;
        $nfrForSpecification->description = "<p>Facilidade de uso, eficiência e satisfação geral do usuário ao interagir com o sistema por meio do Android TV. A usabilidade é um elemento essencial para garantir que os usuários, especialmente idosos ou pessoas com limitações físicas, possam utilizar o sistema de forma intuitiva, alcançar seus objetivos e desfrutar de uma experiência agradável.</p>";
        $nfrForSpecification->acceptance_criteria = "<p>O sistema AAL deve ser facilmente acessível através da interface do Android TV, utilizando o controle remoto padrão ou outros dispositivos de entrada comuns.</p>
        <p>Os ícones e elementos de interface devem ser claros, legíveis e de tamanho adequado para facilitar a identificação e navegação dos recursos do sistema.</p>
        <p>As telas e menus do sistema devem ser organizados de forma lógica e intuitiva, seguindo uma hierarquia coerente e facilitando o fluxo de tarefas.</p>
        <p>O sistema deve oferecer suporte a recursos de voz e comandos por voz, permitindo aos usuários interagir com o sistema por meio de reconhecimento de fala.</p>
        <p>O tempo de resposta do sistema aos comandos do usuário deve ser rápido e responsivo, minimizando atrasos e evitando qualquer sensação de lentidão.</p>
        <p>O sistema deve fornecer feedback adequado ao usuário, informando-o sobre o status de suas ações, erros ou confirmações.</p>
        <p>O sistema AAL deve fornecer um modo de alto contraste ou outras opções de acessibilidade para atender às necessidades dos usuários com baixa visão.</p>
        <p>O sistema deve incluir opções de ajuste de tamanho de fonte para que os usuários possam personalizar a visualização do texto de acordo com suas preferências.</p>";
        $nfrForSpecification->evaluation_metrics = "<p>Tempo para Concluir Tarefas: Medir o tempo médio que os usuários levam para realizar tarefas específicas no sistema AAL, como agendar um lembrete de medicamento ou visualizar resultados de exames.</p>
        <p>Taxa de Erros: Avaliar a frequência de erros cometidos pelos usuários durante a interação com o sistema, como a seleção incorreta de opções ou o não cumprimento de etapas essenciais.</p>
        <p>Satisfação do Usuário: Realizar pesquisas ou questionários para medir o nível de satisfação geral dos usuários com a usabilidade do sistema, coletando feedback sobre a experiência do usuário.</p>
        <p>Taxa de Abandono: Verificar a quantidade de usuários que desistem de usar o sistema AAL em determinadas etapas devido a problemas de usabilidade ou dificuldades de navegação.</p>
        <p>Facilidade de Aprendizado: Observar a rapidez com que novos usuários conseguem aprender a utilizar o sistema AAL, medindo o tempo que levam para realizar tarefas básicas após a primeira interação.</p>";
        $nfrForSpecification->content = file_get_contents(storage_path() . '/files/nfr/sig-usability-file.txt');
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(storage_path() . '/files/nfr/sig-usability-file.png'));
        $nfrForSpecification->save();


        $nonFunctionalRequirements = NonFunctionalRequirements::where("name", "like", 'Security')->first();
        $nfrForSpecification = new Steps5Framework();
        $nfrForSpecification->project_id = $project->id;
        $nfrForSpecification->users_id = 1;
        $nfrForSpecification->is_recommendation = 1;
        $nfrForSpecification->nfr_id = $nonFunctionalRequirements->id;
        $nfrForSpecification->description = "<p>A segurança dos sistemas de monitoramento de saúde AAL na Android TV trata da proteção dos dados pessoais dos usuários, garantindo que as informações armazenadas e transmitidas pelo sistema sejam confidenciais, precisas e acessíveis.</p>";
        $nfrForSpecification->acceptance_criteria = "<p>Apenas os dados necessários devem ser armazenados no STB usando um algoritmo de criptografia seguro, o restante da informação sensível deve vir de um servidor externo utilizando protocolo https.</p>
        <p>O acesso aos dados deve ser restrito a usuários autenticados e autorizados.</p>
        <p>O sistema Android TV deve registrar e monitorar todas as atividades de acesso aos dados, permitindo uma auditoria adequada.</p>
        <p>O sistema em Android TV deve ter medidas efetivas para proteger o sistema, os dados e os usuários contra ameaças, vulnerabilidades e acessos não autorizados.</p>
        <p>O sistema em Android TV deve estar disponível e acessível aos usuários dentro de um nível aceitável de tempo
        <p>O sistema em Android TV deve garantir a integridade e consistência dos dados armazenados.</p>
        <p>O sistema em Android TV deve garantir a segurança e proteção dos conteúdos exibidos.</p>
        <p>O sistema em Android TV deve respeitar e proteger a privacidade dos usuários, garantindo a confidencialidade das informações pessoais.</p>
        <p>O sistema em Android TV deve garantir a segurança do armazenamento de dados e ter procedimentos adequados de backup.</p>
        <p>O sistema em Android TV deve ter mecanismos de proteção contra violações de segurança e ser capaz de se recuperar de possíveis incidentes.</p>";
        $nfrForSpecification->evaluation_metrics = "<p>A taxa de sucesso na autenticação de usuários deve ser de 99\%.</p>
        <p>Não deve haver registros de acesso não autorizado aos dados pessoais nos últimos 12 meses.</p>
        <p>Realizar testes de avaliação de logs e verificação dos acessos aos dados.</p>
        <p>Realizar testes de instrução e avaliação de vulnerabilidades para identificar possíveis brechas de segurança e avaliar a eficácia das medidas de proteção implementadas.</p>
        <p>Medir o tempo de resposta do sistema e registrar o tempo de indisponibilidade para garantir que esteja dentro dos limites definidos.</p>
        <p>Realizar verificações de integridade de dados periódicos e comparar os resultados com os dados armazenados para identificar discrepâncias ou corrupção de dados.</p>
        <p>Implementar medidas de criptografia e autenticação para proteger o conteúdo transmitido e realizar auditorias periódicas para detectar qualquer violação de segurança.</p>
        <p>Realizar uma análise de riscos de privacidade, revisar as políticas de privacidade e implementar medidas de anonimização e consentimento explícito do usuário.</p>
        <p>Verificar a conformidade com as melhores práticas de segurança de armazenamento de dados, realizar testes de recuperação de backup e garantir a integridade dos dados restaurados.</p>";
        $nfrForSpecification->content = file_get_contents(storage_path() . '/files/nfr/sig-security-file_1.3.txt');
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(storage_path() . '/files/nfr/sig-security-file_1.3.png'));
        $nfrForSpecification->save();

        $nonFunctionalRequirements = NonFunctionalRequirements::where("name", "like", 'Adaptability')->first();
        $nfrForSpecification = new Steps5Framework();
        $nfrForSpecification->project_id = $project->id;
        $nfrForSpecification->users_id = 1;
        $nfrForSpecification->is_recommendation = 1;
        $nfrForSpecification->nfr_id = $nonFunctionalRequirements->id;
        $nfrForSpecification->description = "<p>Refere-se à capacidade do sistema AAL de Gestão de Saúde no Android TV de se adaptar a diferentes contextos, necessidades e preferências dos usuários. Ele visa proporcionar uma experiência personalizada e flexível para atender às demandas individuais, garantindo que o sistema seja útil e acessível para diversas situações e perfis de usuários.</p>";
        $nfrForSpecification->acceptance_criteria = "<p>Deve haver mecanismos para que o stakeholder consigam personalizar a interface de acordo com suas preferências, como a reorganização de elementos, a seleção de cores e a escolha de temas.</p>
        <p>O sistema deve ser integrado a assistentes virtuais, como Google Assistant, permitindo a interações por meio de comandos de voz e realizar tarefas de forma mais conveniente.</p>
        <p>O sistema deve ser capaz de fornecer acesso remoto, permitindo que familiares ou cuidadores acompanhem a situação de saúde do usuário e possam oferecer suporte quando necessário.</p>
        <p>Deve haver mecanismos para alertas e notificações do sistema devem ser personalizáveis, permitindo que os usuários configurem preferências de horário, sons e tipos de notificações.</p>";
        $nfrForSpecification->evaluation_metrics = "<p>Nível de Satisfação do Usuário: Realizar pesquisas ou questionários para avaliar o nível de satisfação dos usuários com a adaptabilidade do sistema, considerando a facilidade de personalização e o atendimento às suas necessidades.</p>
        <p>Taxa de Personalização: Medir a porcentagem de usuários que utilizam as opções de personalização da interface e configurações do sistema.</p>
        <p>Taxa Assistentes virtuais: Medir a porcentagem de usuários que utilizam os assistentes virtuais para executar suas tarefas.</p>
        <p>Tempo Médio para Configuração de Alertas: Medir o tempo médio que os usuários levam para configurar alertas e notificações personalizadas, avaliando a facilidade de adaptação do sistema a suas preferências.</p>
        <p>Taxa de Utilização do Modo de Acesso Remoto: Acompanhar a porcentagem de usuários que utilizam o recurso de acesso remoto, demonstrando sua utilidade e flexibilidade para situações de cuidado remoto.</p>";
        $nfrForSpecification->content = file_get_contents(storage_path() . '/files/nfr/sig-adaptability-file.txt');
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(storage_path() . '/files/nfr/sig-adaptability-file.png'));  
        $nfrForSpecification->save();

        $nonFunctionalRequirements = NonFunctionalRequirements::where("name", "like", 'Ethics')->first();
        $nfrForSpecification = new Steps5Framework();
        $nfrForSpecification->project_id = $project->id;
        $nfrForSpecification->users_id = 1;
        $nfrForSpecification->is_recommendation = 1;
        $nfrForSpecification->nfr_id = $nonFunctionalRequirements->id;
        $nfrForSpecification->description = "<p>Refere-se ao compromisso do sistema AAL de Gestão de Saúde em aderir a princípios éticos e respeitar os valores morais e legais relacionados à privacidade e segurança. O sistema deve assegurar uma conduta responsável e transparente na coleta, garantindo que todas as decisões e interações sejam guiadas por padrões éticos sólidos.</p>";
        $nfrForSpecification->acceptance_criteria = "<p>Definir mecanismos de acessibilidade para todos considerando as necessidades de usuários com diferentes habilidades e características.</p>
        <p>Deve haver mecanismos para obter o consentimento explícito dos usuários antes de coletar e processar seus dados pessoais, deixando claro que a finalidade e as formas de utilização desses dados.</p>
        <p>Deve haver mecanismos de revisão das leis e regulamentos de proteção de dados da localidade sejam implementadas, coletando e processando e processados de forma legal e transparente os dados.</p>        
        <p>Deve haver mecanismos para a confidencialidade dos dados pessoais dos usuários, impedindo o acesso não autorizado e o compartilhamento indevido de informações sensíveis.</p>";
        $nfrForSpecification->evaluation_metrics = "<p>Taxa de Consentimento:  Medir a porcentagem de usuários que autorizam o consentimento explícito para a coleta e processamento de seus dados pessoais.</p>
        <p>Ocorrência de Violações de Privacidade: Medir a quantidade de incidentes de violação de privacidade ou segurança dos dados, o valor desejável é abaixo de 1%.</p>
        <p>Leis de Proteção de Dados: Definir checklist para validar se o sistema atende aos requisitos legais relacionados.</p>        
        <p>Acessibilidade do Usuários: Verificar a capacidade de atendimento às necessidades de usuários com diferentes habilidades e características.</p>";
        $nfrForSpecification->content = file_get_contents(storage_path() . '/files/nfr/sig-ethics-file.txt');
        $nfrForSpecification->image = "data:image/png;base64,".base64_encode(file_get_contents(storage_path() . '/files/nfr/sig-ethics-file.png'));
        $nfrForSpecification->save();
        $this::setCompleteStatusStep(5, $project);
        $this::setCompleteStatusStep(6, $project);
    }

    private function setCompleteStatusStep($currentStep, $project) {

        
        $nextStep = StepsFrameworkProject::where("project_id", "=", $project->id)
                                ->where("steps_framework_id", "=", $currentStep+1)->first();

        if ($nextStep->status == Config::get('constants.frameworkStates.disabled')) {

            $stepsFrameworkProject = StepsFrameworkProject::where("project_id", "=", $project->id)
                                    ->where("steps_framework_id", "=", $currentStep)->first();
                                
            $stepsFrameworkProject->status = Config::get('constants.frameworkStates.complete');
            $stepsFrameworkProject->save();

            $nextStep->status = Config::get('constants.frameworkStates.active');
            $nextStep->save();
        }
    }
}





