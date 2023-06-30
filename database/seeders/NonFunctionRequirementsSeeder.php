<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Requirements;
use App\Models\NonFunctionalRequirements;

class NonFunctionRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email' , '=' , 'admin@rs4aal.site' )->first();

        $functionalSuitabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Functional Suitability",
            'description' => "Refere-se ao grau em que o conjunto de funções abrange todas as tarefas e objetivos especificados.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Functional Completeness",
            'description' => "Refere-se ao grau em que o conjunto de funções do sistema abrange todas as tarefas e objetivos especificados. Isso significa que todas as funcionalidades necessárias para realizar as atividades planejadas devem estar presentes.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar uma análise abrangente das necessidades e requisitos dos usuários, identificando todas as tarefas e objetivos que o sistema deve abranger.</p><p>Validar as funcionalidades implementadas por meio de testes e validações com os usuários, verificando se todas as tarefas e objetivos foram contemplados.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $functionalSuitabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

       NonFunctionalRequirements::create([  
            'name' => "Functional Correctness",
            'description' => "Refere-se ao grau em que um sistema fornece resultados corretos com o nível necessário de precisão. Isso significa que o sistema deve produzir os resultados esperados, sem erros ou inconsistências.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar testes rigorosos e verificações de validação para confirmar que os resultados fornecidos pelo sistema são precisos e corretos.</p><p>Envolver os usuários finais nos processos de testes e validações para obter feedback sobre a corretude dos resultados.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $functionalSuitabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Functional Appropriateness",
            'description' => "Refere-se ao grau em que as funções do sistema facilitam a realização de tarefas e objetivos específicos. Isso significa que as funcionalidades devem ser adequadas e relevantes para os usuários, ajudando-os a atingir seus objetivos.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar uma análise detalhada das necessidades e expectativas dos usuários em relação às funcionalidades do sistema.</p><p>Adaptar as funcionalidades às características e preferências dos usuários, levando em consideração fatores como idade, habilidades cognitivas e necessidades específicas.</p><p>Realizar testes de usabilidade para verificar se as funcionalidades são intuitivas, fáceis de usar e eficazes na realização das tarefas e objetivos dos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $functionalSuitabilityRequeriment->id,
            'users_id' => $user->id,
        ]);


        $performanceEfficiencyRequeriment = NonFunctionalRequirements::create([  
            'name' => "Performance Efficiency",
            'description' => "Esta característica representa o desempenho relativo à quantidade de recursos utilizados nas condições estabelecidas.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Time Behavior",
            'description' => "Refere-se ao grau em que os tempos de resposta, processamento e taxa de transferência de um sistema AAL atendem aos requisitos estabelecidos. Isso implica que o sistema deve realizar suas funções de maneira eficiente e dentro de prazos aceitáveis.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar testes de desempenho para medir e avaliar os tempos de resposta e processamento do sistema em diferentes cenários.</p><p>Otimizar algoritmos e arquitetura do sistema para reduzir os tempos de resposta e processamento, garantindo que sejam compatíveis com as necessidades dos usuários.</p><p>Estabelecer requisitos claros em relação aos tempos de resposta aceitáveis para diferentes funcionalidades do sistema AAL.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $performanceEfficiencyRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Resource Utilization",
            'description' => "Refere-se ao grau em que o uso de recursos (como memória, processamento e armazenamento) por parte do sistema atende aos requisitos estabelecidos. Isso implica que o sistema deve utilizar os recursos de forma eficiente, evitando desperdícios ou sobrecargas desnecessárias",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar monitoramento contínuo dos recursos utilizados pelo sistema AAL para identificar possíveis gargalos ou desperdícios.</p><p>Otimizar algoritmos, implementações e arquitetura do sistema para reduzir o consumo de recursos, sem comprometer a funcionalidade e desempenho.</p><p>Estabelecer requisitos claros em relação aos limites aceitáveis de utilização de recursos, levando em consideração as restrições do ambiente e a capacidade dos dispositivos utilizados no sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $performanceEfficiencyRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Capacity",
            'description' => "Refere-se ao grau em que os limites máximos de parâmetros do sistema AAL atendem aos requisitos estabelecidos. Isso implica que o sistema deve ser capaz de lidar com a quantidade esperada de usuários, dispositivos e dados, sem prejudicar sua funcionalidade e desempenho.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar uma análise de capacidade para identificar os limites máximos esperados em termos de usuários, dispositivos e dados.</p><p>Dimensionar a infraestrutura do sistema AAL adequadamente, levando em consideração esses limites máximos, para garantir que o sistema possa acomodar a demanda esperada.</p><p>Estabelecer requisitos claros em relação à capacidade máxima do sistema e monitorar regularmente para garantir que esses limites não sejam excedidos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $performanceEfficiencyRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Punctuality",
            'description' => "Refere-se à capacidade de um sistema AAL de concluir uma tarefa ou cumprir uma obrigação dentro de um prazo previamente determinado. Isso implica que o sistema deve ser confiável em termos de pontualidade para garantir uma experiência satisfatória do usuário.",
            'model_quality' => "Product quality",
            'source' => "<p>Skubich, J. J., et al. Time requirement specification in the graphical design of real-time software. Control Engineering Practice 4.2 (1996): 207-215.</p><p>Mekki, Ahmed, Mohamed Ghazel, and Armand Toguyeni. Patterns-Based Assistance for Temporal Requirement Specification. Proceedings of the International Conference on Software Engineering Research and Practice (SERP). The Steering Committee of The World Congress in Computer Science, Computer Engineering and Applied Computing (WorldComp), 2011.</p>",
            'recommendations' => "<p>Estabelecer prazos realistas e factíveis para a conclusão de tarefas e cumprimento de obrigações no sistema AAL.</p><p>Monitorar e rastrear o progresso das tarefas para garantir que elas sejam concluídas dentro dos prazos estabelecidos.<p></p>Notificar os usuários sobre o andamento das tarefas e fornecer informações claras sobre possíveis atrasos ou alterações nos prazos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $performanceEfficiencyRequeriment->id,
            'users_id' => $user->id,
        ]);

        $usabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Usability",
            'description' => "Grau em que um produto ou sistema pode ser usado por usuários específicos para atingir objetivos específicos com eficácia, eficiência e satisfação em um contexto específico de uso.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Appropriateness Recognizability",
            'description' => "Refere-se ao grau em que os usuários conseguem reconhecer se um sistema AAL é adequado para atender às suas necessidades.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Fornecer informações claras sobre as funcionalidades e benefícios do sistema AAL para que os usuários possam avaliar sua relevância.</p><p>Utilizar uma interface intuitiva e identificável que transmita claramente as características e propósito do sistema.</p><p>Permitir que os usuários realizem testes ou demonstrações para experimentar o sistema antes de tomar uma decisão de uso.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Learnability",
            'description' => "Refere-se ao grau em que os usuários podem aprender a usar o sistema AAL para alcançar os objetivos desejados, de forma eficaz, eficiente, livre de riscos e com satisfação.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Oferecer tutoriais, guias ou documentação clara e acessível para orientar os usuários no processo de aprendizado do sistema.</p><p>Projetar uma curva de aprendizado suave, com recursos de ajuda contextual e feedback imediato para apoiar os usuários durante a interação.</p><p>Priorizar a simplicidade e a consistência na interface do usuário, evitando sobrecarregar os usuários com informações complexas.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Operability",
            'description' => "Refere-se ao grau em que um sistema AAL possui atributos que o tornam fácil de operar e controlar.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Projetar uma interface intuitiva e amigável, com elementos de navegação claros e de fácil compreensão.</p><p>Fornecer opções de personalização e configuração para que os usuários possam ajustar o sistema às suas preferências individuais.</p><p>Implementar recursos de busca e acesso rápido às funcionalidades mais utilizadas para agilizar as interações do usuário.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "User Error Protection",
            'description' => "Refere-se ao grau em que um sistema AAL protege os usuários contra a ocorrência de erros. ",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Implementar mecanismos de validação e verificação para evitar a entrada de dados incorretos ou inconsistências.</p><p>Fornecer mensagens de erro claras e orientações sobre como corrigir os erros.</p><p>Utilizar técnicas de prevenção de erros, como confirmações de ação e desfazer ações, para evitar consequências indesejadas.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Accessibility",
            'description' => "Refere-se ao grau em que um sistema AAL pode ser usado por pessoas com a mais ampla gama de características e capacidades para alcançar um objetivo específico em um contexto de uso especificado.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Garantir que o sistema seja compatível com padrões de acessibilidade, como o WCAG (Web Content Accessibility Guidelines).</p><p>Oferecer opções de personalização da interface, como tamanhos de fonte ajustáveis e suporte a tecnologias assistivas.</p><p>Realizar testes de usabilidade com usuários com diferentes habilidades e necessidades para identificar e corrigir possíveis barreiras de acessibilidade</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Comprehensibility",
            'description' => "O sistema AAL deve ser projetado para garantir que as informações exibidas sejam claras e compreensíveis para todos os usuários, independentemente de suas habilidades cognitivas. Ele deve evitar jargões técnicos e fornecer explicações claras e simples sobre o uso e funcionamento do sistemaa.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Linguagem clara e simples: Utilizar uma linguagem clara e simples ao apresentar informações no sistema AAL. Evitar o uso de termos técnicos ou jargões que possam confundir os usuários. Utilize palavras e frases de fácil compreensão, adaptadas ao público-alvo do sistema.</p><p>Estrutura organizada e intuitiva: Organizar as informações de maneira lógica e intuitiva, seguindo um fluxo de uso natural. Divida as informações em seções e forneça uma estrutura de navegação clara para facilitar a localização e compreensão das funcionalidades do sistema.</p><p>Dicas e orientações contextuais: Fornecer dicas e orientações contextuais para ajudar os usuários a entender o propósito e a forma de utilização das diferentes funcionalidades do sistema. Utilize informações relevantes e concisas para orientar o usuário em suas interações.</p><p>Suporte a diferentes níveis de conhecimento: Levar em consideração que os usuários do sistema AAL podem ter diferentes níveis de conhecimento e familiaridade com tecnologia. Forneça opções de suporte, como tutoriais interativos, guias do usuário ou documentação de ajuda, que estejam disponíveis de forma fácil e acessível dentro do sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $usabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        
        $reliabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Reliability",
            'description' => "Grau em que um sistema, produto ou componente executa funções especificadas sob condições especificadas por um período de tempo especificado.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Maturity",
            'description' => "Refere-se ao grau em que um sistema, produto ou componente atende às necessidades de confiabilidade durante a operação normal.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar testes abrangentes de estabilidade e desempenho do sistema AAL antes do seu lançamento, identificando e corrigindo possíveis falhas ou instabilidades.</p><p>Monitorar continuamente o sistema para detectar e corrigir eventuais problemas de confiabilidade que possam surgir durante o uso.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $reliabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Availability",
            'description' => "Refere-se ao grau em que um sistema, produto ou componente está operacional e acessível quando necessário para uso.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Garantir que o sistema AAL seja projetado para minimizar o tempo de inatividade, com medidas de redundância e backup adequadas.</p><p>Implementar mecanismos de monitoramento em tempo real para detectar falhas e tomar ações rápidas para restaurar a disponibilidade do sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $reliabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Fault Tolerance",
            'description' => "Refere-se ao grau em que um sistema, produto ou componente opera conforme o esperado, mesmo na presença de falhas de hardware ou software.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Utilizar técnicas de projeto e implementação, como redundância de componentes críticos e mecanismos de recuperação de falhas, para garantir a continuidade das funções essenciais do sistema AAL.</p><p>Realizar testes de estresse e simulações de falhas para avaliar a capacidade do sistema de lidar com cenários de falha e garantir uma recuperação adequada.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $reliabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Recoverability",
            'description' => "Refere-se ao grau em que um produto ou sistema AAL é capaz de recuperar os dados afetados diretamente e restabelecer o estado desejado do sistema após uma interrupção ou falha.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Implementar estratégias de backup e recuperação de dados eficazes para proteger as informações críticas dos usuários.</p><p>Fornecer mecanismos de detecção e notificação de falhas para informar os usuários sobre problemas e orientá-los sobre as etapas de recuperação necessárias.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $reliabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Dependability",
            'description' => "Refere-se à capacidade de evitar falhas de serviço que sejam mais frequentes e mais severas do que o aceitável, sem impor restrições às falhas.",
            'model_quality' => "Product quality",
            'source' => "<p>Kinoshita, Yoshiki. User Oriented Dependability. (2009).</p><p>Avizienis, Algirdas, Jean-Claude Laprie, and Brian Randell. Fundamental concepts of dependability. Department of Computing Science Technical Report Series (2001).</p><p>Maciel, Paulo RM, et al. Dependability modeling. Performance and dependability in service computing: concepts, techniques and research directions. IGI Global, 2012. 53-97.</p>",
            'recommendations' => "<p>Realizar análises de risco e implementar medidas de segurança adequadas para prevenir ou minimizar as falhas de serviço em sistemas AAL.</p><p>Garantir que o sistema seja testado em condições reais de uso para avaliar sua confiabilidade e a capacidade de lidar com diferentes cenários de falha.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $reliabilityRequeriment->id,
            'users_id' => $user->id,
        ]);


        $securityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Security",
            'description' => "Grau em que um produto ou sistema protege informações e dados para que pessoas ou outros produtos ou sistemas tenham o grau de acesso aos dados apropriado para seus tipos e níveis de autorização.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Confidentiality",
            'description' => "Refere-se ao grau em que um produto ou sistema AAL garante que os dados sejam acessíveis apenas por pessoas ou outros produtos/sistemas autorizados.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Implementar mecanismos de criptografia robustos para proteger as informações confidenciais dos usuários, como dados pessoais e registros médicos.</p><p>Estabelecer controles de acesso adequados para restringir o acesso aos dados sensíveis apenas a usuários autorizados.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Integrity",
            'description' => "Refere-se ao grau em que um sistema, produto ou componente impede o acesso ou modificação não autorizada de programas ou dados.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Utilizar técnicas de verificação de integridade dos dados, como hashes e assinaturas digitais, para garantir que os dados não tenham sido alterados ou corrompidos.</p><p>Implementar mecanismos de controle de acesso baseados em permissões para garantir que apenas usuários autorizados possam modificar ou acessar dados críticos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Non-repudiation",
            'description' => "Refere-se ao grau em que ações ou eventos podem ser comprovados, de modo que eles não possam ser negados posteriormente.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Implementar mecanismos de registro de eventos e transações para registrar as ações dos usuários no sistema AAL, garantindo assim a rastreabilidade das atividades realizadas.</p><p>Utilizar assinaturas digitais ou técnicas de registro para fornecer evidências irrefutáveis das ações realizadas pelos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Accountability",
            'description' => "Refere-se ao grau em que as ações de uma entidade podem ser rastreadas de forma única até a entidade.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Estabelecer mecanismos de autenticação sólidos para garantir que as ações sejam atribuídas corretamente aos usuários individuais.</p><p>Implementar registros de auditoria detalhados que registrem todas as atividades relevantes dos usuários no sistema AAL.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Authenticity",
            'description' => "Refere-se ao grau em que a identidade de um sujeito ou recurso pode ser comprovada como sendo a que foi declarada.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Utilizar técnicas de autenticação robustas, como autenticação de dois fatores ou biometria, para garantir que apenas usuários legítimos tenham acesso ao sistema AAL.</p><p>Implementar mecanismos de verificação de identidade, como certificados digitais, para validar a autenticidade das partes envolvidas nas transações.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Privacy",
            'description' => "Refere-se ao grau de proteção das informações e dados dos usuários.",
            'model_quality' => "Product quality",
            'source' => "Gomes, Timóteo, and Fernanda Alencar. Um survey com especialistas como validação de elementos para composição de uma ontologia para Sistemas AAL (Ambient Assisted Living). 25th WER. Natal, Brasil (2022).",
            'recommendations' => "<p>Garantir que o sistema AAL esteja em conformidade com as leis e regulamentações de proteção de dados, como o Regulamento Geral de Proteção de Dados (GDPR) na União Europeia.</p><p>Implementar políticas de privacidade claras e transparentes, fornecendo aos usuários controle sobre suas informações pessoais e garantindo o consentimento adequado para o uso desses dados.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Verifiability",
            'description' => "Refere-se à capacidade de comprovar que uma afirmação de fato é verdadeira ou correta.",
            'model_quality' => "Product quality",
            'source' => "Gomes, Timóteo, and Fernanda Alencar. Um survey com especialistas como validação de elementos para composição de uma ontologia para Sistemas AAL (Ambient Assisted Living). 25th WER. Natal, Brasil (2022).",
            'recommendations' => "<p>Implementar mecanismos de registro e auditoria que permitam verificar a veracidade das informações e transações registradas no sistema AAL.</p><p>Utilizar técnicas de verificação de integridade e autenticidade dos dados para garantir que as informações fornecidas pelo sistema sejam confiáveis e precisas.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $securityRequeriment->id,
            'users_id' => $user->id,
        ]);


        $maintainabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Maintainability",
            'description' => "Representa o grau de eficácia e eficiência com que um produto ou sistema pode ser modificado para melhorá-lo, corrigi-lo ou adaptá-lo às mudanças no ambiente e nos requisitos.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Modularity",
            'description' => "Refere-se ao grau em que um sistema ou software é composto por componentes discretos, de modo que uma alteração em um componente tenha impacto mínimo nos outros componentes. ",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Projetar o sistema AAL utilizando uma arquitetura modular, com componentes independentes e bem definidos.</p><p>Evitar acoplamento excessivo entre os componentes, para que as modificações em um componente não afetem negativamente os outros.</p><p>Utilizar técnicas e principios para deixar o sistema aAL mais coeso, reaproveitável e torna a manutenção mais simples.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Reusability",
            'description' => "Refere-se ao grau em que um recurso pode ser utilizado em mais de um sistema ou na construção de outros recursos.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Identificar e documentar os componentes reutilizáveis do sistema AAL, como módulos de software, algoritmos e interfaces.</p><p>Adotar padrões e boas práticas de desenvolvimento que promovam a reusabilidade de código e recursos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Analysability",
            'description' => "Refere-se ao grau de eficácia e eficiência com que é possível avaliar o impacto de uma alteração planejada em uma ou mais partes do sistema AAL, diagnosticar deficiências ou falhas, ou identificar partes a serem modificadas.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Manter uma documentação clara e atualizada do sistema AAL, incluindo diagramas de arquitetura, especificações de componentes e casos de uso.</p><p>Utilizar ferramentas de análise estática de código para identificar possíveis problemas e deficiências no sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Modifiability",
            'description' => "Refere-se ao grau em que um produto ou sistema pode ser modificado de forma eficaz e eficiente, sem introduzir defeitos ou degradar a qualidade existente.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Seguir princípios de design e desenvolvimento de software que favoreçam a modularidade, coesão e baixo acoplamento.</p><p>Realizar testes rigorosos após as modificações para garantir que as funcionalidades existentes não tenham sido afetadas negativamente.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Testability",
            'description' => "Refere-se ao grau de eficácia e eficiência com que os critérios de teste podem ser estabelecidos para um sistema, produto ou componente, e os testes podem ser realizados para determinar se esses critérios foram atendidos.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Definir critérios claros de teste para o sistema AAL, abrangendo aspectos como funcionalidade, desempenho e segurança.</p><p>Utilizar ferramentas de automação de testes para facilitar a execução de testes e aumentar a cobertura de testes.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Traceability",
            'description' => "Refere-se ao grau em que os dados possuem atributos que fornecem um registro de acesso aos dados e de quaisquer alterações feitas aos dados em um contexto específico de uso.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25012:2008 Software engineering",
            'recommendations' => "<p>Implementar mecanismos de registro e auditoria que registrem as atividades relacionadas aos dados do sistema AAL, como acesso, modificação e exclusão.</p><p>Garantir que a rastreabilidade seja preservada ao longo do ciclo de vida do sistema, desde a coleta de dados até o armazenamento e processamento.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $maintainabilityRequeriment->id,
            'users_id' => $user->id,
        ]);


        $portabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Portability",
            'description' => "Grau de eficácia e eficiência com que um sistema, produto ou componente pode ser transferido de um hardware, software ou outro ambiente operacional ou de uso para outro.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Utilize padrões abertos e interfaces bem documentadas para garantir a interoperabilidade com outros sistemas e dispositivos.</p><p>Adote uma abordagem de design modular e flexível, permitindo a fácil adaptação a diferentes tecnologias e ambientes em constante evolução.</p><p>Forneça documentação abrangente e guias de instalação claros para facilitar a implantação do sistema AAL.</p><p>Considere a utilização de ferramentas de virtualização e contêineres para facilitar a portabilidade do sistema em diferentes ambientes.</p><p>Realize testes rigorosos de compatibilidade e interoperabilidade em diferentes plataformas e ambientes para garantir a funcionalidade correta do sistema AAL.</p><p>Mantenha-se atualizado com as tendências e avanços tecnológicos, para garantir que o sistema AAL possa se adaptar a novas demandas e requisitos de portabilidade.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Adaptability",
            'description' => "Refere-se ao grau em que um produto ou sistema pode ser efetiva e eficientemente adaptado para diferentes ambientes de hardware, software ou operacionais, incluindo ambientes de uso em constante evolução.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Projetar o sistema AAL com uma arquitetura flexível e modular que possibilite a fácil adaptação a diferentes ambientes e tecnologias emergentes.</p><p>Utilizar padrões abertos e interfaces bem definidas para facilitar a interoperabilidade e a integração com outros sistemas e dispositivos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $portabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Installability",
            'description' => "Refere-se ao grau de efetividade e eficiência com que um produto ou sistema pode ser instalado e/ou desinstalado em um ambiente específico.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Fornecer instruções claras e intuitivas de instalação para facilitar o processo de implantação do sistema AAL.</p><p>Automatizar, sempre que possível, as tarefas de instalação e configuração do sistema para reduzir a possibilidade de erros e garantir uma instalação consistente.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $portabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Replaceability",
            'description' => "Refere-se ao grau em que um sistema pode substituir outro sistema especificado para o mesmo propósito no mesmo ambiente.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Garantir que o sistema AAL possua funcionalidades e recursos equivalentes aos produtos que pretende substituir, de forma a proporcionar uma transição suave e sem perda de funcionalidade.</p><p>Realizar testes de compatibilidade e interoperabilidade para garantir que o sistema AAL possa funcionar corretamente no ambiente existente e atender aos requisitos dos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $portabilityRequeriment->id,
            'users_id' => $user->id,
        ]);
        

        $compatibilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Compatibility",
            'description' => "Grau de eficácia e eficiência com que um sistema, produto ou componente pode ser transferido de um hardware, software ou outro ambiente operacional ou de uso para outro.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Utilizar padrões abertos e protocolos amplamente adotados para facilitar a interoperabilidade com outros sistemas e dispositivos.</p><p>Realizar testes rigorosos de coexistência para garantir que o sistema AAL possa operar de forma eficiente em um ambiente compartilhado, sem interferir no desempenho de outros produtos.</p><p>Documente claramente as interfaces e protocolos de comunicação utilizados pelo sistema AAL para facilitar a integração com outros sistemas e a troca de informações.</p><p>Manter-se atualizado com os padrões e tecnologias emergentes para garantir que o sistema AAL possa se adaptar às mudanças no ambiente tecnológico e manter sua compatibilidade com outros sistemas.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Co-existence",
            'description' => "Refere-se ao grau em que um produto pode desempenhar suas funções necessárias de forma eficiente ao compartilhar um ambiente e recursos com outros produtos, sem impacto prejudicial em qualquer outro produto",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Projetar o sistema AAL de forma a minimizar conflitos e interferências com outros dispositivos e sistemas presentes no ambiente.</p><p>Utilizar protocolos e padrões de comunicação adequados que permitam a coexistência harmoniosa do sistema AAL com outros sistemas e dispositivos.</p><p>Realizar testes de coexistência para garantir que o sistema AAL funcione corretamente em um ambiente compartilhado, sem prejudicar o desempenho de outros produtos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $compatibilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Interoperability",
            'description' => "Refere-se ao grau em que dois ou mais sistemas, produtos ou componentes podem trocar informações e usar as informações que foram trocadas.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Adotar padrões e protocolos de comunicação amplamente aceitos e interoperáveis no desenvolvimento do sistema AAL.</p><p>Fornecer interfaces e APIs (Application Programming Interfaces) bem definidas para permitir a troca de informações com outros sistemas e dispositivos.</p><p>Realizar testes de interoperabilidade com outros sistemas e dispositivos relevantes para garantir uma integração adequada e o compartilhamento eficiente de informações.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $compatibilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        $adaptivityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Adaptivity",
            'description' => "Refere-se à capacidade do software de modificar seu próprio comportamento em resposta a mudanças em seu ambiente operacional, levando em consideração diversos fatores observáveis pelo sistema, como entrada do usuário, dispositivos externos de hardware e sensores, ou instrumentação do programa.",
            'model_quality' => "Product quality",
            'source' => "Garcés, Lina, et al. Quality attributes and quality models for ambient assisted living software systems: A systematic mapping. Information and Software Technology 82 (2017): 121-138.",
            'recommendations' => "<p>Monitoramento contínuo: Implemente mecanismos de monitoramento em tempo real para capturar dados relevantes do ambiente e dos usuários. Isso pode incluir sensores, dispositivos vestíveis (wearables) e interfaces de interação para coletar informações sobre atividades, saúde, preferências e necessidades dos usuários.</p><p>Análise de dados e aprendizado de máquina: Utilize técnicas de análise de dados e aprendizado de máquina para processar os dados coletados e identificar padrões, tendências e mudanças no ambiente e nas necessidades dos usuários. Isso permitirá que o sistema AAL se adapte automaticamente para fornecer suporte personalizado e eficaz.</p><p>Personalização e customização: Desenvolva recursos que permitam aos usuários personalizar as configurações e preferências do sistema de acordo com suas necessidades individuais. Isso pode incluir ajustes de interface, definição de regras de automação, personalização de alarmes e lembretes, entre outros.</p><p>Interface intuitiva e fácil de usar: Projete uma interface de usuário intuitiva e de fácil utilização, com elementos visuais claros, informações contextuais e feedback adequado. Isso garantirá que os usuários possam interagir com o sistema de forma eficiente, mesmo durante mudanças e adaptações.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        $effectivenessRequeriment = NonFunctionalRequirements::create([  
            'name' => "Effectiveness",
            'description' => "O sistema AAL deve ser projetado de forma a permitir que os usuários atinjam seus objetivos de forma precisa e abrangente. Isso significa que o sistema deve direcionar corretamente as tarefas necessárias e permitir que os usuários as concluam dentro do prazo estabelecido.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Interface intuitiva: Projetar uma interface intuitiva que facilite a compreensão dos usuários sobre como realizar tarefas específicas. Utilizar recursos visuais, como ícones descritivos e rótulos claros, para orientar os usuários e tornar as funcionalidades do sistema AAL facilmente identificáveis.</p><p>Fluxo de trabalho simplificado: Simplificar o fluxo de trabalho do sistema AAL, garantindo que as etapas necessárias para concluir uma tarefa sejam claras e diretas. Evitar etapas desnecessárias ou complexas que possam causar confusão ou atraso nos usuários.</p><p>Feedback imediato: Forneçer feedback imediato aos usuários ao realizar ações ou concluir tarefas. Isso pode ser feito por meio de mensagens de confirmação, notificações visuais ou auditivas para informar aos usuários que a ação foi bem-sucedida ou indicar quaisquer problemas encontrados.</p><p>Personalização das configurações: Permitir que os usuários personalizem as configurações do sistema AAL de acordo com suas preferências e necessidades individuais. Isso pode incluir opções de personalização relacionadas à aparência da interface, alertas, notificações ou preferências de interação.</p><p>Testes de usabilidade iterativos: Realizar testes de usabilidade com usuários representativos em diferentes fases do desenvolvimento do sistema AAL. Isso ajudará a identificar possíveis problemas de eficácia na conclusão de tarefas e permitirá que você faça ajustes e melhorias contínuas no sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Robustness",
            'description' => "Capacidade de um sistema AAL permanecer funcionando adequadamente mesmo diante de perturbações ou condições inesperadas. Isso implica que o sistema deve ser capaz de lidar de forma eficaz e resiliente com eventos inesperados, falhas ou variações nas condições de uso.",
            'model_quality' => "Quality in Use",
            'source' => "Mens, Marjolein JP, et al. The meaning of system robustness for flood risk management. Environmental science & policy 14.8 (2011): 1121-1131.",
            'recommendations' => "<p>Tratamento de exceções: O sistema AAL deve ser capaz de lidar adequadamente com situações de exceção, como perda de conexão com dispositivos, falhas de energia ou falhas de comunicação. Recomenda-se implementar mecanismos de detecção de exceções, tratamento de erros e recuperação adequada do sistema, permitindo que ele se recupere e retorne a um estado funcional estável.</p><p>Tolerância a falhas: É recomendado projetar o sistema AAL para ser tolerante a falhas, de forma que a ocorrência de falhas em um componente não interrompa todo o sistema. Isso pode ser alcançado por meio da redundância de componentes críticos, implementação de backups e mecanismos de recuperação automática.</p><p>Testes de estresse: Realizar testes de estresse e simulações para avaliar a capacidade do sistema AAL de lidar com condições adversas, como altos volumes de dados, cargas de trabalho intensas ou ambientes de rede instáveis. Isso ajudará a identificar possíveis pontos de falha e otimizar o desempenho do sistema em situações críticas.</p><p>Monitoramento contínuo: Implementar sistemas de monitoramento contínuo para acompanhar o desempenho do sistema AAL e identificar quaisquer problemas ou anomalias. Isso permite a detecção precoce de falhas e a tomada de medidas corretivas antes que elas afetem significativamente a funcionalidade do sistema.</p><p>Atualizações e manutenção: Garantir que o sistema AAL seja facilmente atualizável e mantido ao longo do tempo. Isso inclui a correção de falhas de segurança, aprimoramentos de desempenho e incorporação de novas funcionalidades. Mantendo o sistema atualizado, é possível garantir sua eficácia e adaptabilidade às mudanças tecnológicas e necessidades dos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $effectivenessRequeriment->id,
            'users_id' => $user->id,
        ]);

        $satisfactionRequeriment = NonFunctionalRequirements::create([  
            'name' => "Satisfaction",
            'description' => "refere-se ao grau em que as necessidades dos usuários são atendidas quando um produto ou sistema é utilizado em um contexto específico de uso. É a resposta do usuário à interação com o produto ou sistema, incluindo suas atitudes em relação ao uso do mesmo.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Compreensão das necessidades dos usuários: Realizar pesquisas e estudos para compreender profundamente as necessidades, preferências e expectativas dos usuários de sistemas AAL. Isso inclui considerar as características específicas do público-alvo, como idosos, pessoas com deficiências ou pessoas com condições de saúde específicas. Ao entender as necessidades dos usuários, é possível projetar um sistema que atenda às suas demandas e gere satisfação.</p><p>Personalização e adaptação: Oferecer recursos de personalização e adaptação no sistema AAL, permitindo que os usuários ajustem as configurações, preferências e interfaces de acordo com suas necessidades individuais. Isso inclui permitir a configuração de alertas, notificações, níveis de assistência e outras opções que tornem a experiência mais personalizada e adequada às preferências do usuário.</p><p>Facilidade de uso: Garantir que o sistema AAL seja intuitivo e de fácil utilização, com interfaces claras, simples e acessíveis. Isso inclui fornecer instruções claras sobre o uso do sistema, guias de ajuda contextuais, ícones e rótulos compreensíveis, além de evitar o uso de jargões técnicos ou linguagem complexa. Um design centrado no usuário, com ênfase na usabilidade, facilita a interação e contribui para a satisfação dos usuários.</p><p>Confiança e transparência: Construir confiança no sistema AAL é fundamental para promover a satisfação dos usuários. Isso envolve garantir a segurança e a privacidade dos dados pessoais, fornecer informações claras sobre como o sistema funciona, quais dados são coletados e como são utilizados. Transparência nas políticas de privacidade, consentimento adequado para a coleta e uso de dados e a implementação de medidas de segurança robustas são essenciais para gerar confiança nos usuários.</p><p>Avaliação contínua: Realizar avaliações periódicas da satisfação dos usuários por meio de pesquisas, feedback e análise de dados de uso. Essas avaliações ajudam a identificar áreas de melhoria, entender as demandas dos usuários em evolução e tomar medidas corretivas para garantir a satisfação contínua dos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Usefulness",
            'description' => "Refere-se ao grau em que um usuário está satisfeito com o alcance percebido de seus objetivos pragmáticos ao utilizar o sistema AAL, incluindo os resultados e as consequências do uso.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Definição clara dos objetivos pragmáticos: É fundamental compreender e definir claramente os objetivos pragmáticos dos usuários em relação ao sistema AAL. Isso pode ser feito por meio de pesquisas, entrevistas e interações com os usuários para identificar suas necessidades e expectativas. Os objetivos devem ser documentados e considerados ao longo do processo de design e desenvolvimento do sistema.</p><p>Alinhamento dos recursos com os objetivos do usuário: Certifique-se de que os recursos e funcionalidades do sistema AAL estejam alinhados com os objetivos pragmáticos dos usuários. Isso implica em fornecer ferramentas, serviços e suporte que ajudem os usuários a alcançarem seus objetivos de forma eficaz. Considere as principais áreas de atuação do sistema AAL, como monitoramento de saúde, segurança, conforto e independência, e projete soluções que atendam às necessidades dos usuários nessas áreas.</p><p>Avaliação dos resultados e consequências: Realizar avaliações periódicas para determinar se os usuários estão alcançando seus objetivos pragmáticos por meio do uso do sistema AAL. Isso pode ser feito por meio de pesquisas, questionários, observação e feedback dos usuários. Avaliar os resultados obtidos, a satisfação dos usuários e quaisquer consequências positivas ou negativas decorrentes do uso do sistema. Essas informações podem ser usadas para aprimorar o sistema, identificar áreas de melhoria e garantir que o sistema esteja atendendo às necessidades dos usuários.</p>Personalização e adaptação: Ofereçer opções de personalização e adaptação do sistema AAL para atender às necessidades individuais dos usuários. Permitir que os usuários personalizem as configurações, ajustem as preferências e modifiquem as funcionalidades de acordo com suas necessidades específicas. Isso aumenta a utilidade percebida do sistema, pois os usuários têm maior controle sobre como o sistema é utilizado para alcançar seus objetivos pragmáticos.</p><p>Orientação e suporte: Forneçer orientações claras e suporte adequado aos usuários para ajudá-los a utilizar o sistema AAL de maneira eficaz e alcançar seus objetivos pragmáticos. Isso pode incluir tutoriais, manuais de instruções, recursos de ajuda online, atendimento ao cliente e treinamento prático. Certifique-se de que os usuários tenham acesso fácil a esses recursos e que possam contar com suporte quando necessário.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Trust",
            'description' => "Refere-se ao grau em que um usuário ou outra parte interessada tem confiança de que um produto ou sistema se comportará conforme o previsto.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Transparência: É essencial garantir a transparência no funcionamento do sistema AAL para estabelecer a confiança dos usuários. Isso envolve fornecer informações claras e compreensíveis sobre como o sistema opera, quais dados são coletados, como eles são usados e quais medidas são adotadas para proteger a privacidade e segurança dos dados pessoais dos usuários. Recomenda-se disponibilizar uma política de privacidade detalhada, termos de uso e informações sobre as práticas de segurança implementadas, de modo que os usuários possam entender e confiar nas operações do sistema.</p><p>Proteção de dados: Para promover a confiança dos usuários, é crucial garantir a proteção adequada dos dados pessoais coletados pelo sistema AAL. Recomenda-se implementar medidas de segurança robustas, como criptografia de dados, controles de acesso, autenticação forte e monitoramento de atividades suspeitas. Além disso, é importante cumprir as regulamentações de privacidade de dados, como o <name_general_protection_regulation>, e obter o consentimento adequado dos usuários para o processamento de seus dados pessoais.</p><p>Testes e validações: Realizar testes rigorosos e validações do sistema AAL para demonstrar sua confiabilidade e conformidade com padrões de qualidade estabelecidos. Isso inclui a realização de testes de segurança, testes de desempenho, revisões de código e auditorias regulares para identificar e corrigir possíveis vulnerabilidades e garantir o bom funcionamento do sistema. A disponibilização de certificações de segurança e conformidade também pode aumentar a confiança dos usuários e partes interessadas.</p><p>Feedback do usuário: Valorizar o feedback dos usuários e incorporar suas necessidades e expectativas no desenvolvimento e aprimoramento contínuo do sistema AAL. Isso pode ser feito por meio de pesquisas, entrevistas, grupos de discussão e análise de métricas de uso. Ao envolver os usuários no processo, é possível demonstrar comprometimento com a melhoria contínua e construir uma relação de confiança, mostrando que suas preocupações e sugestões são levadas a sério.</p>",
            'content' => "<name_general_protection_regulation> = Regulamento Geral de Proteção de Dados (RGPD)",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Pleasure",
            'description' => "Refere-se ao grau em que um usuário obtém prazer ao satisfazer suas necessidades pessoais. Essas necessidades pessoais podem incluir a busca por novos conhecimentos e habilidades, a comunicação da identidade pessoal e a evocação de memórias agradáveis.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Personalização: Ofereçer recursos e funcionalidades no sistema AAL que permitam aos usuários personalizarem suas experiências de acordo com suas preferências individuais. Isso pode incluir opções de ajuste de configurações, escolha de temas visuais, configuração de lembretes e preferências de interação. Ao permitir que os usuários personalizem o sistema de acordo com suas necessidades e preferências, eles terão uma sensação maior de controle e satisfação, obtendo prazer ao usar o sistema.</p><p>Estímulo cognitivo e emocional: Projetar o sistema AAL para fornecer estímulos cognitivos e emocionais positivos aos usuários. Isso pode ser alcançado por meio da disponibilização de conteúdos educacionais relevantes e interessantes, atividades interativas que promovam o aprendizado e o desenvolvimento de habilidades, e recursos que permitam a expressão da identidade pessoal. Além disso, o sistema pode ser projetado para evocar memórias agradáveis, como fotos familiares, músicas preferidas ou histórias pessoais, promovendo um senso de prazer e conexão emocional.</p><p>Gamificação: Explorar elementos de gamificação no design do sistema AAL. A integração de elementos de jogos, como recompensas, desafios e metas alcançáveis, pode tornar a experiência mais envolvente e prazerosa para os usuários. Isso pode incluir a criação de sistemas de pontuação, níveis de progressão, desafios cognitivos e recompensas virtuais. Ao transformar atividades diárias em experiências lúdicas e gratificantes, os usuários podem obter prazer adicional ao utilizar o sistema AAL.</p><p>Feedback positivo: Fornecer feedback positivo e encorajador aos usuários durante a interação com o sistema AAL. Isso pode ser feito por meio de mensagens motivacionais, reconhecimento de conquistas pessoais, incentivo ao progresso e feedback reforçador. O feedback positivo aumenta a motivação e o prazer do usuário ao utilizar o sistema, tornando a experiência mais gratificante e estimulante.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Comfort",
            'description' => "O conforto refere-se ao grau de satisfação do usuário em relação ao conforto físico proporcionado pelo sistema AAL. Isso envolve garantir que o usuário se sinta confortável durante a interação com o sistema, levando em consideração fatores ergonômicos, adaptabilidade e bem-estar físico.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Design ergonômico: O sistema AAL deve ser projetado levando em consideração princípios ergonômicos, considerando a variedade de usuários e suas necessidades físicas. Isso inclui fornecer controles e interfaces de fácil acesso, considerar a ergonomia de dispositivos e interfaces de usuário, e adaptar o sistema às diferentes capacidades físicas e sensoriais dos usuários. Recomenda-se realizar testes de usabilidade com usuários representativos para identificar possíveis problemas de conforto físico e fazer ajustes adequados no design.</p><p>Personalização: Oferecer opções de personalização do sistema AAL para atender às preferências individuais dos usuários em relação ao conforto físico. Isso pode incluir ajustes de luminosidade, contraste, tamanho de fonte e outros parâmetros visuais, assim como a possibilidade de adaptar os dispositivos e interfaces de acordo com as necessidades e preferências de cada usuário. Permitir que os usuários ajustem o sistema de acordo com suas preferências físicas contribui para um maior conforto e satisfação durante a utilização.</p><p>Monitoramento de condições físicas: Implementar recursos de monitoramento de condições físicas dos usuários, quando aplicável, como temperatura, umidade, qualidade do ar e níveis de iluminação. Essas informações podem ser utilizadas para ajustar automaticamente o ambiente e os dispositivos do sistema AAL para proporcionar um maior conforto físico. Por exemplo, o sistema pode regular a temperatura ambiente, a iluminação ou a umidificação do ar com base nas preferências do usuário e nas condições físicas detectadas.</p><p>Feedback tátil: Quando apropriado, fornecer feedback tátil ao usuário para aumentar o conforto físico. Isso pode incluir o uso de dispositivos de retorno tátil, como vibrações suaves ou feedback tátil em interfaces táteis, para auxiliar na interação com o sistema AAL. O feedback tátil adequado pode fornecer uma sensação de conforto e segurança durante a utilização do sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Dynamic",
            'description' => "Refere-se à sua habilidade de se adaptar e responder adequadamente a mudanças no ambiente, requisitos, condições de uso e outros fatores variáveis. Isso inclui a capacidade de se ajustar a novas situações, atualizar-se, reconfigurar-se ou reagir de forma flexível às mudanças, mantendo um desempenho satisfatório.",
            'model_quality' => "Quality in Use",
            'source' => "Smith, Linda B., and Esther Thelen. Development as a dynamic system. Trends in cognitive sciences 7.8 (2003): 343-348.",
            'recommendations' => "<p>Flexibilidade: O sistema AAL deve ser projetado com flexibilidade para lidar com requisitos em constante evolução e mudanças nas necessidades dos usuários. Isso pode ser alcançado por meio de uma arquitetura modular e escalável, que permita a adição ou remoção de funcionalidades de forma ágil. Recomenda-se adotar padrões e tecnologias que facilitem a interoperabilidade e a integração com outros sistemas, permitindo a expansão e adaptação contínuas do sistema AAL.</p><p>Atualizações e manutenção: É importante garantir que o sistema AAL possa ser atualizado e mantido ao longo do tempo, incorporando melhorias, correções de bugs e novas funcionalidades. Isso requer a implementação de um processo eficiente de atualização, considerando a facilidade de instalação e compatibilidade com versões anteriores. Além disso, é essencial fornecer suporte técnico adequado para garantir que os usuários possam lidar com qualquer problema ou dúvida relacionados às atualizações.</p><p>Monitoramento e adaptação: Recomenda-se implementar recursos de monitoramento contínuo no sistema AAL, que permitam a detecção de mudanças nas condições de uso, no ambiente ou nas necessidades dos usuários. Com base nesses dados, o sistema deve ser capaz de se adaptar e ajustar suas funcionalidades e configurações para fornecer um suporte adequado. Isso pode incluir a personalização de configurações, a sugestão de novas funcionalidades relevantes e a otimização de desempenho com base nas informações coletadas.</p><p>Interação com dispositivos e serviços externos: O sistema AAL deve ser capaz de interagir com dispositivos e serviços externos, como sensores, atuadores, sistemas de saúde e redes de suporte. Essa capacidade de integração permite que o sistema se adapte a novos dispositivos e serviços que possam surgir no mercado, garantindo a interoperabilidade e a capacidade de resposta às mudanças nas necessidades dos usuários.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Private",
            'description' => "Refere-se ao grau de proteção e controle que os usuários têm sobre suas informações pessoais e o uso dessas informações pelo sistema AAL. O objetivo é evitar situações indesejadas, garantindo a confidencialidade, integridade e disponibilidade dos dados pessoais.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Consentimento informado: É fundamental obter o consentimento informado dos usuários para a coleta, processamento e armazenamento de seus dados pessoais. Isso deve ser feito de forma clara, transparente e compreensível, explicando quais informações serão coletadas, como serão usadas e quais serão os direitos dos usuários em relação aos seus dados. Recomenda-se fornecer opções claras de consentimento e permitir que os usuários revoguem seu consentimento a qualquer momento.</p><p>Gerenciamento de dados pessoais: O sistema AAL deve adotar medidas técnicas e organizacionais adequadas para garantir a segurança e a privacidade dos dados pessoais dos usuários. Isso inclui o uso de criptografia, acesso restrito aos dados, proteção contra acesso não autorizado, monitoramento de segurança e processos de backup regulares. Além disso, é importante implementar políticas claras de retenção e exclusão de dados, permitindo que os usuários tenham controle sobre suas informações pessoais.</p><p>Transparência: Os usuários devem ter acesso a informações claras e compreensíveis sobre como suas informações pessoais são coletadas, usadas e compartilhadas pelo sistema AAL. Recomenda-se fornecer uma política de privacidade detalhada, explicando os propósitos do uso de dados, as entidades envolvidas, os direitos dos usuários e as medidas de segurança adotadas. Além disso, é importante fornecer meios para que os usuários possam acessar e revisar suas informações pessoais armazenadas no sistema.</p><p>Anonimização e pseudonimização: Quando apropriado e possível, é recomendado utilizar técnicas de anonimização e pseudonimização para proteger a identidade dos usuários no sistema AAL. Isso pode ser feito substituindo informações pessoais por identificadores exclusivos ou agregando dados de forma a tornar impossível a identificação direta dos usuários. Essas técnicas ajudam a minimizar o risco de associação indesejada de informações pessoais e a preservar a privacidade dos usuários.</p><p>Educação e conscientização: Promover a educação e conscientização dos usuários sobre a importância da privacidade e a forma como o sistema AAL lida com seus dados pessoais. Isso pode ser feito por meio de recursos de treinamento, orientações claras de privacidade e informações acessíveis sobre os direitos dos usuários. É importante que os usuários se sintam capacitados e confiantes em relação ao uso de suas informações pessoais no sistema AAL.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $satisfactionRequeriment->id,
            'users_id' => $user->id,
        ]);

        
        $freedomFromRiskRequeriment = NonFunctionalRequirements::create([  
            'name' => "Freedom from risk",
            'description' => "Refere-se ao grau em que um produto ou sistema reduz o risco potencial para o status econômico, vida humana, saúde ou meio ambiente. O risco é uma função da probabilidade de ocorrência de uma determinada ameaça e das consequências adversas potenciais dessa ocorrência.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Análise de Riscos: Realizar uma análise completa de riscos durante o processo de desenvolvimento do sistema AAL. Identificar e avaliar os possíveis riscos associados ao uso do sistema, incluindo riscos relacionados à segurança, saúde e bem-estar dos usuários. Isso permite uma compreensão abrangente dos potenciais riscos e ajuda a orientar a implementação de medidas mitigadoras apropriadas.</p><p>Projeto Seguro: Incorporar princípios de projeto seguro no desenvolvimento do sistema AAL. Isso envolve a implementação de boas práticas de engenharia, a utilização de padrões de segurança reconhecidos e a adoção de medidas de proteção adequadas. Garantir que o sistema seja projetado para minimizar os riscos potenciais para os usuários, através da implementação de mecanismos de segurança robustos, como autenticação, criptografia e controle de acesso.</p><p>Monitoramento Contínuo: Estabelecer um sistema de monitoramento contínuo para identificar e responder a potenciais riscos à medida que surgem. Isso inclui a implementação de mecanismos de detecção de ameaças, a coleta de dados de utilização e desempenho do sistema, e a avaliação regular da eficácia das medidas de mitigação implementadas. O monitoramento contínuo permite uma resposta rápida e eficaz a qualquer risco emergente.</p><p>Treinamento e Conscientização: Fornecer treinamento adequado aos usuários e outros stakeholders sobre os potenciais riscos associados ao uso do sistema AAL. Isso inclui a educação sobre as medidas de segurança e a orientação sobre as melhores práticas de uso do sistema. É importante promover a conscientização sobre os riscos potenciais e capacitar os usuários a tomar medidas preventivas para mitigar esses riscos.</p><p>Atualizações e Manutenção: Manter o sistema AAL atualizado e realizar manutenção regular para garantir que as medidas de segurança estejam em vigor e sejam eficazes ao longo do tempo. Isso inclui a aplicação de patches de segurança, a correção de vulnerabilidades identificadas e a melhoria contínua da segurança do sistema. Garantir que os usuários sejam informados sobre atualizações e incentivá-los a manter seus sistemas atualizados.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Economic risk mitigation",
            'description' => "Refere-se ao grau em que um produto ou sistema mitiga o risco potencial para o status financeiro, operação eficiente, propriedade comercial, reputação ou outros recursos nos contextos de uso pretendidos.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Planejamento financeiro: É essencial considerar o planejamento financeiro ao desenvolver sistemas AAL. Isso envolve a avaliação dos custos de implementação, operação e manutenção do sistema, bem como a identificação e gestão de potenciais riscos financeiros. Recomenda-se realizar uma análise de custo-benefício e uma avaliação de riscos econômicos para determinar a viabilidade financeira do sistema e identificar estratégias de mitigação de riscos.</p><p>Eficiência operacional: Os sistemas AAL devem ser projetados para melhorar a eficiência operacional, otimizando o uso de recursos e reduzindo os custos operacionais. Isso pode ser alcançado por meio da automação de tarefas, integração com outros sistemas existentes, monitoramento remoto e manutenção preventiva. Recomenda-se realizar uma análise de processos para identificar oportunidades de melhoria e implementar soluções que reduzam os custos operacionais e aumentem a eficiência do sistema.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $freedomFromRiskRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Health and safety risk mitigation",
            'description' => "Refere-se ao grau em que um produto ou sistema minimiza os potenciais riscos para as pessoas nos contextos de uso previstos.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Avaliação de Riscos: Avalie os riscos de saúde e segurança, considerando as características dos usuários e as atividades envolvidas. Incluir riscos físicos, tais como, quedas ou lesões, e interação com dispositivos médicos.</p><p>Design Seguro: Deve ser implementado design seguro considerando elementos como ergonomia, acessibilidade, facilidade de uso e resistência a falhas, auxiliando na implementação do sistema AAL sejam seguro e cumpram as normas e regulamentações relevantes de saúde e segurança.</p><p>Interação Segura: Garantir que a interação dos usuários com o sistema AAL seja segura e minimize os riscos de acidentes ou erros. Isso pode ser alcançado por meio de interfaces intuitivas e de fácil utilização, instruções claras e recursos de confirmação de ações críticas. Considere a segurança física dos usuários, evitando elementos perigosos, como fios soltos ou objetos pontiagudos.</p><p>Monitoramento e Alertas: Implementar alertas e monitoramento que possam detectar e comunicar potenciais situações de risco. As normas de usabilidade sugerem que os alertas devem ser claros, compreensíveis e de fácil interpretação pelos usuários, permitindo ação rápida e adequada diante de uma situação de risco.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $freedomFromRiskRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Environmental risk mitigation",
            'description' => "A mitigação de riscos ambientais refere-se ao grau em que um produto ou sistema reduz o potencial risco para a propriedade ou o meio ambiente nos contextos de uso pretendidos.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Avaliação de Riscos: O sistema AAL deve avaliar os riscos ambientais associados e identificar os perigos potenciais  e analisar as consequências desses riscos para a propriedade e o meio ambiente.</p><p>Conscientização e Educação: Promover a conscientização e a educação dos stakeholders sobre a importância dos riscos ambientais no contexto do sistema AAL. Isso pode ser feito por meio de treinamentos, orientações claras de uso responsável e informações sobre boas práticas ambientais.</p><p>Projeto Sustentável: Considerar os princípios de sustentabilidade e ecoeficiência no design e desenvolvimento do sistema AAL, isso pode ajudar na redução do consumo de recursos naturais.</p><p>Monitoramento e controle: Estabelecer sistemas de monitoramento e controle para detectar e mitigar prontamente qualquer impacto ambiental negativo causado pelo sistema AAL. De forma a mitigar riscos ambientais e aumentar a rastreabilidade, mantenha sempre os registros precisos e atualizados.</p><p>Gerenciamento adequado de resíduos: Implementar práticas adequadas de gerenciamento de resíduos relacionados, pode ajudar a classificação correta dos resíduos gerados e outras medicas como a reciclagem, reutilização e a disposição adequada de resíduos perigosos.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $freedomFromRiskRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Social stigma risk mitigation",
            'description' => "Este requisito não funcional visa reduzir o risco de estigma social que possa comprometer a capacidade dos indivíduos de garantir e manter sua independência social por conta própria. O estigma social pode surgir quando os usuários de sistemas AAL são percebidos como menos capazes ou dependentes devido ao uso dessas tecnologias.",
            'model_quality' => "Quality in Use",
            'source' => "Gomes, Timóteo, and Fernanda Alencar. Um survey com especialistas como validação de elementos para composição de uma ontologia para Sistemas AAL (Ambient Assisted Living). 25th WER. Natal, Brasil (2022).",
            'recommendations' => "<p>Design Inclusivo: O sistema AAL deve ser projetado de forma inclusiva, levando em consideração as necessidades, habilidades, preferências dos usuários, acessibilidade, facilidade de uso e personalização, a fim de atender às diversas necessidades dos usuários.</p><p>Interface Discreta: É importante que o sistema AAL tenha uma interface discreta e não chamativa. O design da interface deve ser discreto e semelhante aos objetos ou dispositivos comuns encontrados em um ambiente doméstico. Isso ajuda a evitar que o uso do sistema seja percebido como diferente ou estigmatizado.</p><p>Envolvimento dos Usuários: O stakeholders deve participar do início do processo de desenvolvimento do sitema AAL. Envolver o stakeholder pode contribuir para sua aceitação e redução do estigma social.</p><p>Privacidade e Confidencialidade: Implementar mecanismos de privacidade e confidencialidade dos dados coletados e processados pelo sistema AAL para que suas informações pessoais não serão compartilhadas de forma inadequada ou discriminatória, isso pode ajudar a construir confiança e reduzir preocupações relacionadas ao estigma.</p><p>Educação e Conscientização: Esclarecer os stakeholders sobre a importância dos sistemas AAL pode auxilia na redução do estigma social.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $freedomFromRiskRequeriment->id,
            'users_id' => $user->id,
        ]);


        $contextCoverageRequeriment = NonFunctionalRequirements::create([  
            'name' => "Context Coverage",
            'description' => "Refere-se ao grau em que um produto ou sistema pode ser utilizado com efetividade, eficiência, liberdade de riscos e satisfação tanto em contextos de uso especificados quanto em contextos além daqueles inicialmente identificados explicitamente.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Análise do Contextos de Uso: Mapear e análise os diferentes contextos de uso em que o sistema AAL será utilizado. Isso deve auxiliar a compreender as particularidades de cada situação, permitindo que o sistema seja projetado e adaptado para atender às demandas específicas de diferentes contextos.</p><p>Flexibilidade e Adaptabilidade: Projete o sistema AAL de forma flexível e adaptável, de modo a permitir sua utilização em diferentes contextos. Isso pode incluir a personalização de configurações, interfaces e funcionalidades para atender às necessidades específicas de cada contexto de uso. Considere também a compatibilidade com dispositivos e tecnologias existentes nos diferentes ambientes em que o sistema será utilizado.</p><p>Testes de Contextos: Realize testes e avaliações em diversos cenários de uso, tanto nos contextos especificados quanto em contextos além daqueles inicialmente identificados. Isso permitirá identificar possíveis desafios, restrições ou necessidades que possam surgir em diferentes situações. Os testes devem incluir os mapeados e simular condições variadas para garantir que o sistema funcione de maneira efetiva, eficiente e segura em uma ampla gama de contextos.</p><p>Coleta de Feedback dos Usuários: Implementar um processo de feedback contínuo em diferentes contextos de uso para auxiliar a identificar melhorias no sistema AAL nos contextos de uso.</p><p>Atualizações e Manutenção: Garantir as atualizações períodicas do sistema AAL, de forma a acompanhar a evolução dos contextos de uso. Isso inclui o monitoramento de novas tecnologias, mudanças nas necessidades dos usuários e atualizações regulatórias. Manter o sistema atualizado garantirá que ele permaneça efetivo, eficiente, seguro e satisfatório em diferentes contextos ao longo do tempo.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "context Completeness",
            'description' => "Refere-se ao grau em que um produto ou sistema pode ser utilizado com eficácia, eficiência, liberdade de riscos e satisfação em todos os contextos de uso especificados. Isso implica que o sistema AAL deve ser capaz de atender aos objetivos pretendidos, de forma efetiva, eficiente, segura e satisfatória, em todos os contextos de uso previstos.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Análise do Contextos de Uso: Mapear e análise os diferentes contextos de uso em que o sistema AAL será utilizado. Isso deve auxiliar a compreender as particularidades de cada situação, permitindo que o sistema seja projetado e adaptado para atender às demandas específicas de diferentes contexto.</p><p>Flexibilidade e Adaptabilidade: Projete o sistema AAL de forma flexível e adaptável, de modo a permitir sua utilização em diferentes contextos. Isso pode incluir a personalização de configurações, interfaces e funcionalidades para atender às necessidades específicas de cada contexto de uso. Considere também a compatibilidade com dispositivos e tecnologias existentes nos diferentes ambientes em que o sistema será utilizado.</p><p>Testes de Contextos: Realize testes e avaliações em diversos cenários de uso, tanto nos contextos especificados quanto em contextos além daqueles inicialmente identificados. Isso permitirá identificar possíveis desafios, restrições ou necessidades que possam surgir em diferentes situações. Os testes devem incluir os mapeados e simular condições variadas para garantir que o sistema funcione de maneira efetiva, eficiente e segura em uma ampla gama de contextos.</p><p>Suporte Técnico e Assistência: Fornecer suporte técnico e assistência aos usuários do sistema AAL em todos os contextos de uso auxilia na utilização do sistema AAL de forma eficaz e satisfatória.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $contextCoverageRequeriment->id,
            'users_id' => $user->id,
        ]);

        NonFunctionalRequirements::create([  
            'name' => "Flexibility",
            'description' => "É o grau em que um produto ou sistema pode ser usado com efetividade, eficiência, ausência de riscos e satisfação em contextos além daqueles inicialmente especificados nos requisitos. A flexibilidade pode ser alcançada adaptando um produto para grupos de usuários adicionais, tarefas e culturas. Ela permite que os produtos considerem circunstâncias, oportunidades e preferências individuais que não haviam sido previstas antecipadamente. Se um produto não for projetado para flexibilidade, pode não ser seguro usá-lo em contextos não planejados. A flexibilidade pode ser medida como a extensão em que um produto pode ser usado por tipos adicionais de usuários para alcançar objetivos adicionais com efetividade, eficiência, ausência de riscos e satisfação em tipos adicionais de contextos de uso, ou pela capacidade de ser modificado para suportar adaptação a novos tipos de usuários, tarefas e ambientes, e adequação para a individualização conforme definido na norma ISO 9241-110.",
            'model_quality' => "Quality in Use",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>
            Integração com Tecnologias e Dispositivos Externos: A interoperabilidade do sistema AAL facilita a adaptação e a diferentes contextos de uso do sistema.</p><p>Personalização: Utilize padrões que permitam a personalização no sistema AAL baseado no contexto de utilização e as preferências de acordo com suas necessidades dos stakeholders.</p><p>Suporte a Múltiplos Idiomas e Culturas: Forneça suporte a múltiplos idiomas, seja selecionando automaticamente ou escolham manualmente. Além disso, leve em conta diferenças culturais e práticas sociais ao projetar as interfaces e funcionalidades, garantindo que sejam adequadas e aceitáveis em diferentes contextos culturais. Isso aumenta a flexibilidade do sistema, permitindo que ele seja utilizado por usuários de diferentes origens e contextos culturais.</p><p>Design Modular: Utilizar uma abordagem de design modular, permite que o sistema AAL seja adaptado e expandido para atender a diferentes requisitos, contextos de uso e às mudanças ao longo do tempo.</p>",
            'content' => "",
            'image' => "",
            'characteristics_id' => $contextCoverageRequeriment->id,
            'users_id' => $user->id,
        ]);

        
        
        

//         Requirements::create([  
//             'name' => "Health and safety risk mitigation",
//             'description' => "degree to which a product or system mitigates the potential risk to people in the intended contexts of use.",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => $requeriment->id,
//             'users_id' => $user->id,
//         ]);
    
    }
}





