<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StepsFramework;
use App\Models\Steps2Framework;


class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();   
        // $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Home Safety and Care' )->first();
     
        StepsFramework::create([  
            'code' => "Step 1",
            'name' => "Levantar Requisitos Legais",
            'description' => "Esta etapa tem como objetivo identificar e analisar os requisitos legais, regulamentos, diretrizes e padrões relevantes para sistemas AAL, com foco na usabilidade e aceitabilidade. Essa documentação apresenta informações sobre o requisito legal ou normativo relevante, incluindo o nome, descrição, texto legal/referência e os requisitos não funcionais impactados por este requisito.",
            'output' => "Documentação dos requisitos legais identificados e analisados.",
        ]); 
        
        StepsFramework::create([  
            'code' => "Step 2.1",
            'name' => "Identificar Stakeholders",
            'description' => "Esta etapa tem como objetico identificar os diferentes stakeholders envolvidos no sistema AAL e analisar suas necessidades, expectativas e experiências em relação ao sistema. Sua análise deve ter o foco na usabilidade e aceitabilidade, permitindo priorizar as demandas dos stakeholders e estabelecer uma comunicação efetiva ao longo do processo de desenvolvimento.",
            'output' => "Lista de stakeholders relevantes e documentação das suas necessidades, expectativas e experiências relacionadas à usabilidade e aceitabilidade do sistema AAL.",
        ]);

        StepsFramework::create([  
            'code' => "Step 2.2",
            'name' => "Analisar Stakeholders",
            'description' => "Esta etapa tem como objetico identificar os diferentes stakeholders envolvidos no sistema AAL e analisar suas necessidades, expectativas e experiências em relação ao sistema. Sua análise deve ter o foco na usabilidade e aceitabilidade, permitindo priorizar as demandas dos stakeholders e estabelecer uma comunicação efetiva ao longo do processo de desenvolvimento.",
            'output' => "Lista de stakeholders relevantes e documentação das suas necessidades, expectativas e experiências relacionadas à usabilidade e aceitabilidade do sistema AAL.",
        ]);

        StepsFramework::create([  
            'code' => "Step 3.1",
            'name' => "Definir Técnicas",
            'description' => "Esta etapa tem como objetivo coletar informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL. Para chegar ao objetivo, pode ser utilizado entrevistas, pesquisas, observações, storytelling ou outras técnicas de coleta de dados.",
            'output' => "O método de captura dos dados com o idoso e o planejamento de como será usado o método.",
        ]);

        StepsFramework::create([  
            'code' => "Step 3.2",
            'name' => "Coletar Experiência dos Stakeholders",
            'description' => "Esta etapa tem como descrever o que foi coletado de informações sobre a experiência dos stakeholders em relação à usabilidade e aceitabilidade de sistemas AAL.",
            'output' => "Dados e insights obtidos a partir das atividades de coleta de experiência dos stakeholders.",
        ]);

        StepsFramework::create([
            'code' => "Step 4",
            'name' => "Definir Requisitos não Funcionais",
            'description' => "Com base nos requisitos legais e normativos identificados, bem como nas informações coletadas sobre a experiência dos stakeholders, os requisitos não funcionais relacionados à usabilidade e aceitabilidade do sistema AAL são definidos.",
            'output' => "Documentação dos requisitos não funcionais específicos relacionados à usabilidade e aceitabilidade do sistema AAL.",
        ]);

        StepsFramework::create([  
            'code' => "Step 5",
            'name' => "Especificar Requisitos não Funcionais",
            'description' => "Os requisitos não funcionais são especificados de forma clara e precisa, fornecendo operacionalizações e justificativas (Claim) nas operacionalizações sobre cada requisito não funcional entre outros elementos relevantes.",
            'output' => "Documentação detalhada (SIG) dos requisitos não funcionais especificados.",
        ]);


        // $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();
        // Steps2Framework::create([  
        //     'stakeholder_id' => "Step 5",
        //     'steps_framework_project_id' => "Especificar Requisitos não Funcionais",

        // ]);

        // Step 5
        // *aceitabilidade*
        // Descrição
        // A aceitabilidade é um requisito não funcional crucial para sistemas AAL, pois determina o grau de satisfação e aprovação dos usuários finais em relação à tecnologia assistiva. O objetivo é garantir que o sistema seja bem recebido, atenda às expectativas dos usuários e seja integrado facilmente em suas rotinas diárias


        // Critérios de Aceitação :

        // <p>Facilidade de Uso: Os stakeholders devem conseguir interagir e utilizar o sistema AAL de forma intuitiva, mesmo aqueles com pouca experiência em tecnologia, considerando que a curva de aprendizado deve ser mínima, permitindo que os usuários compreendam rapidamente as funcionalidades e comandos do sistema.</p>
        // <p>Adaptabilidade: O sistema AAL deve ser configurável e adaptável para atender às preferências individuais dos usuários, considerando personalização de interface, ajuste de parâmetros e suporte a diferentes perfis de usuário.</p>
        // <p>Segurança e Privacidade: Os stakeholders devem sentir-se confiantes de que seus dados pessoais estão protegidos e que o sistema AAL opera de forma segura, utilizando a comunicação de dados criptografada e respeitada em todos os momentos a privacidade.</p>
        // <p>Eficácia: O sistema AAL deve demonstrar um desempenho eficaz no suporte às atividades diárias dos usuários, proporcionando resultados positivos e melhorando a qualidade de vida dos mesmos.</p>


        // Métricas de Avaliação:

        // <p>Taxa de Adoção: Medir a proporção de stakeholders que efetivamente adotaram o sistema AAL em suas rotinas diárias. Quanto maior a taxa de adoção, maior a aceitação do sistema.</p>
        // <p>Tempo de Aprendizado: Avaliar o tempo médio necessário para que os usuários aprendam a utilizar as funcionalidades principais do sistema AAL. Quanto menor o tempo de aprendizado, mais aceitável o sistema é considerado.</p>
        // <p>Satisfação do Usuário: Coletar a opinião dos usuários sobre o sistema AAL por meio de pesquisas ou questionários de satisfação. Uma alta taxa de satisfação indica uma maior aceitabilidade do sistema.</p>
        // <p>Número de Erros e Problemas: Registrar a quantidade de erros ou problemas enfrentados pelos usuários durante o uso do sistema AAL. Menos problemas podem indicar maior aceitabilidade.</p>
        // <p>Efetividade das Funcionalidades: Avaliar a eficácia das funcionalidades do sistema AAL em auxiliar os usuários em suas atividades diárias. Quanto mais efetivo o sistema, maior a sua aceitação.</p>
        // <p>Feedback dos Usuários: Analisar o feedback direto dos usuários, seja por meio de avaliações, comentários ou relatórios de bugs. O feedback positivo é um indicativo de maior aceitabilidade.</p>



//         Usabilidade

// Descrição:
// Facilidade de uso, eficiência e satisfação geral do usuário ao interagir com o sistema por meio do Android TV. A usabilidade é um elemento essencial para garantir que os usuários, especialmente idosos ou pessoas com limitações físicas, possam utilizar o sistema de forma intuitiva, alcançar seus objetivos e desfrutar de uma experiência agradável.

// Critérios de Aceitação:

// <p>O sistema AAL deve ser facilmente acessível através da interface do Android TV, utilizando o controle remoto padrão ou outros dispositivos de entrada comuns.</p>
// <p>Os ícones e elementos de interface devem ser claros, legíveis e de tamanho adequado para facilitar a identificação e navegação dos recursos do sistema.</p>
// <p>As telas e menus do sistema devem ser organizados de forma lógica e intuitiva, seguindo uma hierarquia coerente e facilitando o fluxo de tarefas.</p>
// <p>O sistema deve oferecer suporte a recursos de voz e comandos por voz, permitindo aos usuários interagir com o sistema por meio de reconhecimento de fala.</p>
// <p>O tempo de resposta do sistema aos comandos do usuário deve ser rápido e responsivo, minimizando atrasos e evitando qualquer sensação de lentidão.</p>
// <p>O sistema deve fornecer feedback adequado ao usuário, informando-o sobre o status de suas ações, erros ou confirmações.</p>
// <p>O sistema AAL deve fornecer um modo de alto contraste ou outras opções de acessibilidade para atender às necessidades dos usuários com baixa visão.</p>
// <p>O sistema deve incluir opções de ajuste de tamanho de fonte para que os usuários possam personalizar a visualização do texto de acordo com suas preferências.</p>

// Métricas de Avaliação:

// <p>Tempo para Concluir Tarefas: Medir o tempo médio que os usuários levam para realizar tarefas específicas no sistema AAL, como agendar um lembrete de medicamento ou visualizar resultados de exames.</p>
// <p>Taxa de Erros: Avaliar a frequência de erros cometidos pelos usuários durante a interação com o sistema, como a seleção incorreta de opções ou o não cumprimento de etapas essenciais.</p>
// <p>Satisfação do Usuário: Realizar pesquisas ou questionários para medir o nível de satisfação geral dos usuários com a usabilidade do sistema, coletando feedback sobre a experiência do usuário.</p>
// <p>Taxa de Abandono: Verificar a quantidade de usuários que desistem de usar o sistema AAL em determinadas etapas devido a problemas de usabilidade ou dificuldades de navegação.</p>
// <p>Facilidade de Aprendizado: Observar a rapidez com que novos usuários conseguem aprender a utilizar o sistema AAL, medindo o tempo que levam para realizar tarefas básicas após a primeira interação.</p>


// Segurança

// Descrição:
//  proteção dos dados pessoais dos usuários, garantindo a confidencialidade, integridade e disponibilidade das informações armazenadas e transmitidas pelo sistema. A segurança é de extrema importância em um ambiente que lida com dados sensíveis de saúde, assegurando que apenas usuários autorizados possam acessar e manipular essas informações, e que qualquer ameaça potencial seja mitigada de forma adequada.

// Critérios de Aceitação:
// <p>Deve haver mecanismos de seguro na autenticação para garantir que apenas usuários autorizados possam acessar as informações e recursos do sistema.</p>

// <p>Mecanismos de criptografia para armazenamento de dos dados pessoais de saúde, garantindo que em caso de acesso não autorizado, essas informações permaneçam ilegíveis.</p>

// <p>Deve haver mecanismos de revisão para verificação de informações sensíveis são impressos em logs, mensagens de erro ou outras saídas não autorizadas.</p>

// <p>Mecanismos de política de controle de acesso acordo com as funções e responsabilidades, limitando o acesso a dados confidenciais apenas aos profissionais autorizados.</p>

// <p>Deve haver um mecanismo para auditoria e registro de atividades para o monitoramento de acessos e a detecção de comportamentos suspeitos.</p>

// Métricas de Avaliação:
// <p>Gestão de Acesso: Avaliar a gestão da identidade do usuário, garantindo que a autorização seja devidamente atribuída e revogando quando necessário.</p>

// <p>Acesso não autorizadas: Registrar e analise as tentativas de usuários não autorizados de acessar o sistema para identificar possíveis ameaças ou atividades suspeitas.</p>

// <p>Tempo de resposta para detecção de intrusos: Medir o tempo necessário para o sistema identificar possíveis invasões ou comportamentos maliciosos e tomar as devidas ações corretivas.</p>

// <p>Sucesso de Autenticação: Medir as tentativas de autenticação bem-sucedidas em relação ao total de tentativas. </p>


    // #Adaptabilidade

    // Descrição:
    // Refere-se à capacidade do sistema AAL de Gestão de Saúde no Android TV de se adaptar a diferentes contextos, necessidades e preferências dos usuários. Ele visa proporcionar uma experiência personalizada e flexível para atender às demandas individuais, garantindo que o sistema seja útil e acessível para diversas situações e perfis de usuários.

    // Critérios de Aceitação:

    // <p>Deve haver mecanismos para que o stakeholder consigam personalizar a interface de acordo com suas preferências, como a reorganização de elementos, a seleção de cores e a escolha de temas.</p>

    // <p>O sistema deve ser integrado a assistentes virtuais, como Google Assistant, permitindo a interações por meio de comandos de voz e realizar tarefas de forma mais conveniente.</p>

    // <p>O sistema deve ser capaz de fornecer acesso remoto, permitindo que familiares ou cuidadores acompanhem a situação de saúde do usuário e possam oferecer suporte quando necessário.</p>

    // <p>Deve haver mecanismos para alertas e notificações do sistema devem ser personalizáveis, permitindo que os usuários configurem preferências de horário, sons e tipos de notificações.</p>

    // Métricas de Avaliação:

    // <p>Nível de Satisfação do Usuário: Realizar pesquisas ou questionários para avaliar o nível de satisfação dos usuários com a adaptabilidade do sistema, considerando a facilidade de personalização e o atendimento às suas necessidades.</p>

    // <p>Taxa de Personalização: Medir a porcentagem de usuários que utilizam as opções de personalização da interface e configurações do sistema.</p>

    // <p>Taxa Assistentes virtuais: Medir a porcentagem de usuários que utilizam os assistentes virtuais para executar suas tarefas.</p>

    // <p>Tempo Médio para Configuração de Alertas: Medir o tempo médio que os usuários levam para configurar alertas e notificações personalizadas, avaliando a facilidade de adaptação do sistema a suas preferências.</p>

    // <p>Taxa de Utilização do Modo de Acesso Remoto: Acompanhar a porcentagem de usuários que utilizam o recurso de acesso remoto, demonstrando sua utilidade e flexibilidade para situações de cuidado remoto.</p>

//     #Ética
//     Descrição:
//     O RNF de Ética refere-se ao compromisso do sistema AAL de Gestão de Saúde em aderir a princípios éticos e respeitar os valores morais e legais relacionados à privacidade e segurança. O sistema deve assegurar uma conduta responsável e transparente na coleta, garantindo que todas as decisões e interações sejam guiadas por padrões éticos sólidos.

//     Critérios de Aceitação:

//     <p>Definir mecanismos de acessibilidade para todos considerando as necessidades de usuários com diferentes habilidades e características.</p>

//     <p>Deve haver mecanismos para obter o consentimento explícito dos usuários antes de coletar e processar seus dados pessoais, deixando claro que a finalidade e as formas de utilização desses dados.</p>

//     <p>Deve haver mecanismos de revisão das leis e regulamentos de proteção de dados da localidade sejam implementadas, coletando e processando e processados de forma legal e transparente os dados.</p>

//     <p>Deve haver mecanismos para a confidencialidade dos dados pessoais dos usuários, impedindo o acesso não autorizado e o compartilhamento indevido de informações sensíveis.</p>



// Métricas de Avaliação:

// <p>Taxa de Consentimento:  Medir a porcentagem de usuários que autorizam o consentimento explícito para a coleta e processamento de seus dados pessoais.</p>

// <p>Ocorrência de Violações de Privacidade: Medir a quantidade de incidentes de violação de privacidade ou segurança dos dados, o valor desejável é abaixo de 1%.</p>

// <p>Leis de Proteção de Dados: Definir checklist para validar se o sistema atende aos requisitos legais relacionados.</p>

// <p>Acessibilidade do Usuários: Verificar a capacidade de atendimento às necessidades de usuários com diferentes habilidades e características.</p>

    }
}





