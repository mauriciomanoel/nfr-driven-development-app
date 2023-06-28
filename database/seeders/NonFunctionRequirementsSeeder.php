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
            'characteristics_id' => 0,
            'users_id' => $user->id,
        ]);

        
        // NonFunctionalRequirements::create([  
        //     'name' => "Adaptivity",
        //     'description' => "Is the software capability to modify its own behaviour in response to changes in its operating environment (i.e., anything observable by the software system, such as end-user input, external hardware devices and sensors, or program instrumentation)",
        //     'model_quality' => "Product quality",
        //     'source' => "P. Oreizy et al., \"An architecture-based approach to self-adaptive software,\" in IEEE Intelligent Systems and their Applications, vol. 14, no. 3, pp. 54-62, May-June 1999, doi: 10.1109/5254.769885.",
        //     'characteristics_id' => 0,
        //     'users_id' => $user->id,
        // ]);



//         Requirements::create([  
//             'name' => "Adaptivity",
//             'description' => "Is the software capability to modify its own behaviour in response to changes in its operating environment (i.e., anything observable by the software system, such as end-user input, external hardware devices and sensors, or program instrumentation)",
//             'model_quality' => "Product quality",
//             'source' => "P. Oreizy et al., \"An architecture-based approach to self-adaptive software,\" in IEEE Intelligent Systems and their Applications, vol. 14, no. 3, pp. 54-62, May-June 1999, doi: 10.1109/5254.769885.",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

//         $requeriment = Requirements::create([  
//             'name' => "Compatibility",
//             'description' => "degree to which a product, system or component can exchange information with other products, systems or components, and/or perform its required functions, while sharing the same hardware or software environment.",
//             'model_quality' => "Product quality",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

//         Requirements::create([  
//             'name' => "Interoperability",
//             'description' => "degree to which two or more systems, products or components can exchange information and use the information that has been exchanged.",
//             'model_quality' => "Product quality",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => $requeriment->id,
//             'users_id' => $user->id,
//         ]);

//         $requeriment = Requirements::create([  
//             'name' => "Context coverage",
//             'description' => "degree to which a product or system can be used with effectiveness, efficiency, freedom from risk and satisfaction in both specified contexts of use and in contexts beyond those initially explicitly identified.",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

//         Requirements::create([  
//             'name' => "Flexibility",
//             'description' => "degree to which a product or system can be used with effectiveness, efficiency, freedom from risk and satisfaction in contexts beyond those initially specified in the requirements
// Note 1 to entry: Flexibility can be achieved by adapting a product (see 4.2.8.1) for additional user groups, tasks and cultures.
// Note 2 to entry: Flexibility enables products to take account of circumstances, opportunities and individual preferences that had not been anticipated in advance.
// Note 3 to entry: If a product is not designed for flexibility, it might not be safe to use the product in unintended contexts.
// Note 4 to entry: Flexibility can be measured either as the extent to which a product can be used by additional types of users to achieve additional types of goals with effectiveness, efficiency, freedom from risk and satisfaction in additional types of contexts of use, or by a capability to be modified to support adaptation for new types of users, tasks and environments, and suitability for individualization as defined in ISO 9241-110.",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => $requeriment->id,
//             'users_id' => $user->id,
//         ]);

//         $requeriment = Requirements::create([  
//             'name' => "Effectiveness",
//             'description' => "accuracy and completeness with which users achieve specified goals.",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

//         Requirements::create([  
//             'name' => "Robustness",
//             'description' => "The degree to which the information system proceeds as usual even after an interruption.",
//             'model_quality' => "Quality in use",
//             'source' => "Paradkar, Sameer. Mastering Non-Functional Requirements. Packt Publishing Ltd, 2017.",
//             'requirements_id' => $requeriment->id,
//             'users_id' => $user->id,
//         ]);

//         $requeriment = Requirements::create([  
//             'name' => "Efficiency",
//             'description' => "resources expended in relation to the accuracy and completeness with which users achieve goals",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

//         $requeriment = Requirements::create([  
//             'name' => "Freedom from risk",
//             'description' => "degree to which a product or system mitigates the potential risk to economic status, human life, health, or the environment
//             Note 1 to entry: Risk is a function of the probability of occurrence of a given threat and the potential adverse consequences of that threat's occurrence.",
//             'model_quality' => "Quality in use",
//             'source' => "ISO/IEC 25010:2011",
//             'requirements_id' => 0,
//             'users_id' => $user->id,
//         ]);

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





