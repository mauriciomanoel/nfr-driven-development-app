<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Requirements;
use App\Models\LegalAndNormativeRequirements;
use App\Models\LifeSettings;
use App\Models\NonFunctionalRequirements;
use Carbon\Carbon;


class LegalAndNormativeRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();
        $lifeSettings = LifeSettings::where('name' , '=' , 'Generic' )->first();

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "Regulamento Geral de Proteção de Dados (RGPD)",
            'description' => "O sistema AAL deve cumprir as disposições do RGPD em relação à coleta, processamento e armazenamento de dados pessoais. Isso inclui obter o consentimento adequado dos usuários para o uso de seus dados, garantir a segurança e a privacidade desses dados, e possibilitar que os usuários acessem, retifiquem e excluam suas informações pessoais.",
            'legal_references' => "<p>Artigo 6(1)(a) do RGPD - Base legal para o processamento de dados pessoais com o consentimento do titular dos dados.</p><p>Artigo 25 do RGPD - Princípio da proteção de dados desde a concepção e por padrão.</p>",
            'recommendations' => "<p>Implementar um mecanismo de obtenção de consentimento explícito dos usuários para o processamento de seus dados pessoais.</p><p>Adotar medidas técnicas e organizativas adequadas para garantir a segurança e privacidade dos dados pessoais.</p><p>Disponibilizar uma interface para que os usuários possam acessar, retificar e excluir suas informações pessoais.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Security', 'Privacy', 'Confidentiality'])->get();
        foreach($requirements as $requirement) {
            var_dump($requirement->name);
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "Acessibilidade dos sítios Web e das aplicações móveis de organismos do setor público",
            'description' => "O sistema AAL deve ser projetado e desenvolvido levando em consideração os princípios de acessibilidade, garantindo que seja utilizável por pessoas com diferentes níveis de habilidades e capacidades. Isso inclui a implementação de recursos e funcionalidades que permitam o acesso e a interação por parte de pessoas com deficiência, como pessoas com deficiência visual, auditiva, motora ou cognitiva.",
            'legal_references' => "<p>Diretiva (UE) 2016/2102 relativa à acessibilidade dos sítios Web e das aplicações móveis de organismos do setor público - https://eur-lex.europa.eu/legal-content/PT/LSU/?uri=CELEX:32016L2102</p><p>Norma ISO 9241-171:2020 - Requisitos de acessibilidade e usabilidade para produtos e serviços interativos</p>",
            'recommendations' => "<p>Realizar testes de usabilidade com usuários representativos de diferentes habilidades e capacidades para garantir a acessibilidade e usabilidade do sistema.</p><p>Implementar diretrizes e padrões de acessibilidade reconhecidos, como as diretrizes WCAG (Web Content Accessibility Guidelines).</p><p>Fornecer suporte para tecnologias assistivas, como leitores de tela e teclados alternativos.</p><p>Garantir que a interface do sistema seja compatível com diferentes tamanhos de tela e resoluções.</p><p>Oferecer opções de personalização da interface, como controle de contraste, tamanho de fonte e opções de navegação alternativas.</p>",
            'content' => "https://eur-lex.europa.eu/legal-content/PT/LSU/?uri=CELEX:32016L2102",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Usability', 'Accessibility', 'Fault tolerance', "Adaptability", "Comprehensibility"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/IEC 27001:2022(en) Information security, cybersecurity and privacy protection — Information security management systems",
            'description' => "O sistema AAL deve ser projetado e implementado de acordo com os padrões e regulamentos de segurança aplicáveis, garantindo a integridade e confiabilidade do sistema. O objetivo é proteger informações confidenciais, impedir o acesso não autorizado e mitigar possíveis riscos e ameaças à segurança.",
            'legal_references' => "<p>ISO/IEC 27001:2022 - Sistemas de gestão de segurança da informação. Este padrão internacional fornece uma estrutura para estabelecer, implementar, manter e melhorar continuamente um sistema de gerenciamento de segurança da informação - https://www.iso.org/obp/ui/#iso:std:iso-iec:27001:ed-3:v1:en.</p><p>Leis e regulamentos de proteção de dados e privacidade aplicáveis. Isso pode incluir o Regulamento Geral de Proteção de Dados (GDPR) e outras leis regionais ou específicas do setor que regem a coleta, o processamento e o armazenamento de dados pessoais.</p>",
            'recommendations' => "
            <p>Realize uma avaliação de risco abrangente: Identifique e avalie possíveis riscos de segurança e vulnerabilidades específicas do sistema AAL. Isso inclui avaliar segurança física, segurança de rede, criptografia de dados, controles de acesso e procedimentos de resposta a incidentes.</p>
            <p>Implemente controles de acesso fortes: utilize mecanismos de autenticação robustos, como senhas fortes ou autenticação multifator, para garantir que apenas indivíduos autorizados possam acessar o sistema AAL. Implemente funções e permissões de usuário para restringir o acesso a informações confidenciais com base no princípio do menor privilégio.</p>
            <p>Criptografar dados confidenciais: aplique técnicas de criptografia para proteger dados confidenciais em trânsito e em repouso. Isso ajuda a proteger as informações contra acesso não autorizado ou interceptação, fornecendo uma camada adicional de segurança.</p>
            <p>Atualize e corrija regularmente o software: mantenha todos os componentes de software, incluindo sistemas operacionais, aplicativos e firmware, atualizados com os patches de segurança mais recentes. Revise e aplique regularmente atualizações de segurança para lidar com vulnerabilidades conhecidas e reduzir o risco de exploração.</p>
            <p>Realizar treinamento de conscientização de segurança: Educar usuários, administradores e partes interessadas sobre as melhores práticas de segurança, incluindo higiene de senha, conscientização de phishing e o tratamento adequado de dados confidenciais. Sessões regulares de treinamento podem ajudar a reforçar a conscientização sobre segurança e promover uma cultura de segurança dentro do sistema AAL.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Reliability', 'Availability', 'Performance', "Usability", "Auditability"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO 9241-171:2008 Ergonomics of human-system interaction",
            'description' => "O sistema AAL deve ser projetado para atender às necessidades de uma ampla gama de usuários, considerando recursos como acessibilidade, linguagem clara e opções de personalização. O design inclusivo visa garantir que o sistema possa ser usado por indivíduos com diversas habilidades, incluindo aqueles com deficiências ou habilidades cognitivas limitadas. O objetivo é fornecer uma experiência inclusiva e amigável para todos os usuários.",
            'legal_references' => "<p>ISO 9241-171:2008 Ergonomics of human-system interaction - https://www.iso.org/obp/ui/en/#iso:std:iso:9241:-171:ed-1:v1:en.</p>",
            'recommendations' => "
            <p>Acessibilidade: Certifique-se de que o sistema AAL seja acessível a usuários com deficiências seguindo os padrões de acessibilidade relevantes, como as Diretrizes de Acessibilidade de Conteúdo da Web (WCAG). Forneça modos alternativos de interação, como comandos de voz ou reconhecimento de gestos, para acomodar usuários com limitações físicas.</p>
            <p>Linguagem clara: use linguagem clara e concisa na interface do usuário e na documentação para aprimorar a compreensão de usuários com habilidades cognitivas variadas. Evite jargão técnico e forneça explicações e instruções de maneira direta.</p><p>Opções de personalização: permite que os usuários personalizem o sistema de acordo com suas preferências e necessidades. Forneça configurações ajustáveis para tamanho de fonte, contraste de cor e volume de áudio. Permita que os usuários personalizem o layout e a organização das informações para atender às suas necessidades individuais.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Usability', 'Accessibility', 'Satisfaction', "Reliability"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "Usabilidade",
            'description' => "O sistema AAL deve ser projetado considerando os princípios de usabilidade, facilitando seu uso pelos usuários independentemente de suas habilidades técnicas. Usabilidade refere-se à medida em que um sistema pode ser usado por usuários específicos para atingir objetivos específicos com eficácia, eficiência e satisfação em um contexto específico de uso.",
            'legal_references' => "
            <p>ISO 9241-210:2019 - Ergonomics of human-system interaction — Part 210: Human-centred design for interactive - https://www.iso.org/obp/ui/en/#iso:std:iec:31010:ed-2:v1:en.</p>
            <p>ISO/IEC 25010:2011 Systems and software engineering - https://www.iso.org/obp/ui/en/#iso:std:iso-iec:25010:ed-1:v1:en.</p>",
            'recommendations' => "
            <p>Projeto centrado no usuário: Aplique uma abordagem de projeto centrado no usuário ao desenvolver o sistema AAL. Isso envolve envolver os usuários no processo de design, conduzir pesquisas com eles para entender suas necessidades e requisitos e testar e refinar iterativamente o sistema com base no feedback do usuário.</p>
            <p>Interface clara e intuitiva: crie uma interface clara, intuitiva e fácil de navegar. Use padrões de design, ícones e rótulos consistentes e familiares para garantir que os usuários possam entender rapidamente como interagir com o sistema.</p>
            <p>Feedback e orientação adequados: Forneça aos usuários feedback oportuno e significativo sobre suas ações. Use dicas visuais e auditivas para confirmar as entradas do usuário e indicar as respostas do sistema. Além disso, ofereça ajuda contextual e orientação para ajudar os usuários a entender os recursos e a funcionalidade do sistema.</p>
            <p>Eficiência e eficácia: Otimize o desempenho do sistema para garantir um uso eficiente e eficaz. Minimize etapas e interações desnecessárias, simplifique fluxos de trabalho e forneça atalhos ou recursos de automação quando apropriado. Isso permitirá que os usuários realizem suas tarefas rapidamente e com o mínimo de esforço.</p>            
            5. Prevenção e recuperação de erros: Antecipe e evite erros por meio de um design cuidadoso. Implemente mecanismos de validação, como validação de entrada e mensagens de erro, para ajudar os usuários a evitar erros. Além disso, habilite a recuperação fácil de erros, fornecendo instruções claras sobre como corrigir erros e oferecendo opções de desfazer ou reverter</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Performance', 'Reliability', 'Learnability', "Satisfaction"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "Health Informatics",
            'description' => "ISO/TS 22272:2021 é um padrão na área de Informática em Saúde que fornece uma metodologia para analisar as necessidades de negócios e informações das empresas de saúde. O padrão visa apoiar o desenvolvimento de arquiteturas baseadas em padrões no setor de saúde. Ele fornece orientação sobre a realização de análises abrangentes para identificar os requisitos e desafios enfrentados pelas empresas de saúde na implementação de tecnologias e sistemas de informação.",
            'legal_references' => "<p>ISO/TS 22272:2021 - Health Informatics - https://www.iso.org/obp/ui/#iso:std:iso:ts:22272:ed-1:v1:en.</p>",
            'recommendations' => "
            <p>Realize uma análise completa: Siga a metodologia descrita na ISO/TS 22272:2021 para realizar uma análise abrangente das necessidades de negócios e informações das empresas de saúde. Essa análise deve incluir a compreensão da estrutura organizacional, fluxos de trabalho, requisitos de troca de informações e infraestrutura tecnológica da organização de saúde.</p>
            <p>Identificar os requisitos de interoperabilidade: Identificar as necessidades de interoperabilidade e os desafios da empresa de saúde. Isso inclui avaliar a compatibilidade dos sistemas existentes, os requisitos de compartilhamento de dados e a capacidade de integração com sistemas e padrões externos.</p>
            <p>Priorizar arquiteturas baseadas em padrões: enfatizar o uso de arquiteturas baseadas em padrões no projeto e implementação de soluções de informática em saúde. Aderir aos padrões da indústria promove a interoperabilidade, troca de dados e compatibilidade entre diferentes sistemas, garantindo comunicação perfeita e compartilhamento de informações.</p><p>Garanta a segurança e privacidade dos dados: Implemente medidas de segurança apropriadas para proteger dados de saúde sensíveis. Cumpra as leis relevantes de proteção de dados e privacidade, como criptografia de dados em trânsito e em repouso, controles de acesso e auditorias regulares de segurança.</p>
            <p>Considere a escalabilidade e a preparação para o futuro: Projete as soluções de informática em saúde com a escalabilidade em mente, garantindo que elas possam acomodar o crescimento futuro e os avanços da tecnologia. Isso inclui flexibilidade para se adaptar a padrões em evolução e a capacidade de integrar novas funcionalidades e tecnologias.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Interoperability', 'Security', 'Performance', "Usability", "Scalability", "Reliability", "Maintainability", "Accessibility", "Auditability"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "AAL Guidelines for Ethics, data privacy and security",
            'description' => "As Diretrizes de Ética, Privacidade e Segurança de Dados da AAL são um documento que fornece um modelo para alcançar a excelência ética em tecnologias digitais para um envelhecimento ativo e saudável. Integra o cumprimento da legislação geral com um diálogo ético e oferece reflexões sobre como estabelecer excelência ética para soluções voltadas para o envelhecimento ativo e saudável por meio de tecnologias digitais.",
            'legal_references' => "<p>ISO TC314 Ageing Societies</p>
            <p>EN 301 549 V3.2.1 (2021-03) Accessibility requirements for ICT products and services</p>
            <p>CEN-ISO/TS 82304-2:2021 Health and wellness apps – quality and reliability</p>
            <p>IEC 62304:2006 Medical device software – Software lifecycle processes</p>
            <p>IEC 62366-1:2015 Medical devices – Application of usability engineering to medical devices</p>
            <p>ISO 13485:2016 Medical devices – Quality management systems – Requirements for regulatory purposes</p>
            <p>ISO 14971:2019 Medical devices – Application of risk management to medical devices</p>
            <p>ISO 14155:2020 Clinical investigation of medical devices for human subjects – Good clinical practice</p>
            <p>ISO/IEC 27001:2022 – Information security management</p>",
            'recommendations' => "
            <p>Assegurar que a conceção e o desenvolvimento de tecnologias digitais para um envelhecimento ativo e saudável se baseiam em princípios e valores éticos.</p>
            <p>Garantir que a privacidade e a segurança dos dados pessoais sejam protegidas durante todo o ciclo de vida da tecnologia digital.</p>
            <p>Garantir que a tecnologia digital seja acessível e utilizável por todos os usuários, incluindo aqueles com deficiências ou deficiências.</p>
            <p>Garantir que a tecnologia digital seja projetada para promover a autonomia, a independência e a dignidade dos idosos.</p>
            <p>Garantir que a tecnologia digital seja projetada para apoiar a inclusão social e a conexão entre os idosos.</p>
            <p>Promover a autonomia, independência e dignidade dos idosos, por exemplo, permitindo que eles controlem seus próprios dados pessoais e tomem decisões informadas sobre o uso da tecnologia digital.</p>
            <p>Estabelecer um diálogo ético com todos os stakeholders relevantes, incluindo idosos, cuidadores, profissionais de saúde e desenvolvedores de tecnologia digital.</p>
            <p>Garantir que os usuários finais sejam informados sobre seus direitos e tenham a capacidade de exercê-los.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Usability', 'Accessibility', 'Privacy', "Security", "Ethics", "Autonomy"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }


        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/IEC 25066:2016 - Software Engineering - Software product Quality Requirements and Evaluation (SQuaRE) - Common Industry Format (CIF) for Usability: User requirements for feedback",
            'description' => "A norma ISO/IEC 25066:2016 é uma parte da série ISO/IEC 25000, que trata da avaliação de qualidade de produtos de software. Especificamente, a ISO/IEC 25066 estabelece requisitos para a documentação de produtos de software, com o objetivo de garantir que a informação fornecida seja adequada, precisa e útil para os usuários finais, desenvolvedores e outros stakeholders envolvidos no ciclo de vida do software.",
            'legal_references' => "<p>https://www.iso.org/standard/63831.html</p>",
            'recommendations' => "
            <p>Identificação clara do público-alvo da documentação, de forma a adequar o conteúdo e o formato às necessidades dos usuários finais, desenvolvedores ou outros stakeholders específicos.</p>
            <p>Garantir que a documentação seja completa, abrangente e consistente, cobrindo todos os aspectos relevantes do produto de software.</p>            
            <p>Utilizar uma linguagem clara e concisa, evitando terminologias ambíguas ou jargões técnicos que possam dificultar a compreensão.</p>            
            <p>Fornecer instruções detalhadas sobre a instalação, configuração e operação do software, a fim de facilitar a sua utilização eficiente.</p>
            <p>Incluir exemplos e ilustrações que auxiliem na compreensão dos conceitos e funcionalidades do software.</p>            
            <p>Manter a documentação atualizada e compatível com as versões mais recentes do produto de software.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Accuracy', 'Completeness', 'Coherence', "Usability", "Clarity"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }


        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO 9241-11:2018 Ergonomics of human-system interaction — Part 11: Usability: Definitions and concepts",
            'description' => "ISO 9241-11:2018 is a part of the ISO 9241 series, which deals with the ergonomic design of human-system interactions. Specifically, ISO 9241-11 provides essential definitions and concepts related to usability, aiming to establish a common understanding of usability concepts among designers, developers, and other stakeholders involved in creating interactive systems. This standard addresses key aspects of usability, such as effectiveness, efficiency, and user satisfaction, and emphasizes the importance of considering user needs and characteristics throughout the design process.",
            'legal_references' => "<p>https://www.iso.org/standard/63500.html</p>",
            'recommendations' => "
            <p>Understand User Characteristics: Designers should thoroughly analyze the characteristics, needs, and requirements of the intended user group to tailor the interactive system accordingly.</p>
            <p>Focus on Effectiveness: Ensure that the interactive system enables users to accomplish their tasks accurately and completely, without errors or unnecessary complexity.</p>            
            <p>Enhance Efficiency: Strive to optimize the efficiency of user interactions with the system, minimizing the time and effort required to perform tasks.            
            <p>Consider User Satisfaction: User satisfaction is a crucial aspect of usability. Designers should aim to create systems that are pleasant to use and fulfill users' expectations.</p>        
            <p>Provide Feedback: Interactive systems should offer appropriate feedback to users, keeping them informed about the system's status, progress, and outcomes.</p>            
            <p>Ensure Learnability: Make the system easy to learn and understand for new users, allowing them to quickly become proficient in its use.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Usability', 'User Experience', 'Accessibility', "Performance", "Flexibility", "User Error Protection"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/IEC 40500:2012 Information technology — W3C Web Content Accessibility Guidelines (WCAG) 2.0",
            'description' => "ISO/IEC 40500:2012, also known as the Web Content Accessibility Guidelines (WCAG) 2.0, is an international standard developed by the World Wide Web Consortium (W3C) in collaboration with the International Organization for Standardization (ISO) and the International Electrotechnical Commission (IEC). The standard provides guidelines and success criteria for making web content more accessible to people with disabilities, ensuring that web pages and web applications can be used and understood by a broader audience, including those with visual, auditory, cognitive, and motor impairments. The guidelines cover various aspects of web content accessibility, including perceivability, operability, understandability, and robustness, and are designed to enhance the overall user experience for all users, regardless of their abilities.",
            'legal_references' => "<p>https://www.iso.org/standard/58625.html</p>",
            'recommendations' => "
            <p>Provide Alternative Text: Use descriptive alternative text for non-text content, such as images, to ensure users with visual impairments can understand the content.</p>
            <p>Ensure Keyboard Accessibility: Ensure all functionality and content on the website can be accessed using a keyboard alone, without requiring mouse interactions.</p>            
            <p>Provide Synchronized Multimedia Alternatives: Offer alternatives for time-based media content, like captions and audio descriptions for videos, to support users with hearing impairments.</p>            
            <p>Use Consistent Navigation and Layout: Maintain a consistent and predictable layout and navigation structure to help users understand and navigate the website easily.</p>            
            <p>Create Accessible Forms: Ensure that all form elements are properly labeled and can be understood and completed by users with various disabilities.</p>            
            <p>Test with Assistive Technologies: Conduct accessibility testing using various assistive technologies to verify that the content is perceivable and operable for users with disabilities.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Accessibility', 'Usability', 'Compatibility', "Performance", "Reliability"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/IEC 27001:2013 - Information technology - Security techniques - Information security management systems - Requirements",
            'description' => "ISO/IEC 27001:2013 is an international standard that falls under the category of information technology and security techniques. It specifically deals with information security management systems (ISMS) and lays down the requirements for establishing, implementing, maintaining, and continually improving an ISMS within the context of an organization. The standard emphasizes the importance of systematically managing information security risks to safeguard the confidentiality, integrity, and availability of sensitive information assets. It provides a framework for organizations to develop a comprehensive approach to identifying, assessing, and mitigating information security risks while also ensuring compliance with legal, regulatory, and contractual requirements.",
            'legal_references' => "<p>https://www.iso.org/standard/27001</p>",
            'recommendations' => "
            <p>Conduct Information Security Risk Assessment: Identify and assess the information security risks faced by the organization, considering internal and external threats.</p>
            <p>Develop an Information Security Policy: Create a comprehensive information security policy that defines the organization's commitment to information security and sets the framework for the ISMS.</p>
            <p>Implement Risk Treatment Measures: Develop and implement appropriate risk treatment plans to mitigate identified information security risks.</p>
            <p>Train and Raise Awareness: Train employees and stakeholders on information security best practices and raise awareness about the importance of information security.</p>            
            <p>Monitor and Review: Regularly monitor, review, and assess the effectiveness of the ISMS, making necessary improvements to address evolving risks and challenges.</p>            
            <p>Conduct Periodic Audits: Perform internal and external audits of the ISMS to ensure compliance and identify areas for improvement.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Compliance', 'Confidentiality', 'Integrity', "Availability", "Reliability"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/TS 24289:2021 - Health informatics — Hierarchical file structure specification for secondary storage of health-related information",
            'description' => "ISO/TS 24289:2021 is a technical specification in the field of health informatics. It specifically deals with the specification of a hierarchical file structure for the secondary storage of health-related information. The standard provides guidelines and requirements for organizing and storing health-related data in a hierarchical manner to ensure efficient retrieval, management, and security of the information. The hierarchical file structure defined in this technical specification is designed to be used in the context of secondary storage systems, where large volumes of health-related data are stored for long-term archiving and accessibility.",
            'legal_references' => "<p>https://www.iso.org/standard/27001</p>",
            'recommendations' => "
            <p>Implement Hierarchical Organization: Follow the specified hierarchical file structure to categorize and organize health-related information systematically.</p><p>Consider Scalability: Design the secondary storage system to accommodate the growing volume of health-related data over time, ensuring scalability.</p>
            <p>Data Integrity and Security: Implement robust data integrity and security measures to protect the confidentiality and privacy of health-related information.</p>
            <p>Long-Term Archiving: Ensure that the hierarchical file structure and storage system can support long-term archiving of health-related data without loss or corruption.</p>
            <p>Interoperability: Consider interoperability requirements to enable seamless data exchange and sharing between different healthcare systems and facilities.</p>
            <p>Compliance with Regulatory Standards: Adhere to relevant legal, regulatory, and industry standards for the storage and handling of health-related information.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Security', 'Performance', 'Reliability', "Scalability", "Integrity"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }

        $legalAndNormativeRequirement = LegalAndNormativeRequirements::create([  
            'name' => "ISO/TR 21332:2021 - Health informatics — Cloud computing considerations for the security and privacy of health information systems",
            'description' => "ISO/TR 21332:2021 is a technical report in the field of health informatics. It focuses on providing considerations and guidelines for the security and privacy aspects of health information systems when using cloud computing technologies. The report addresses the unique challenges and opportunities related to adopting cloud computing in the healthcare industry while safeguarding the confidentiality, integrity, and availability of health information.The technical report offers insights into best practices, risk management, and security measures that healthcare organizations should consider when migrating or deploying health information systems in cloud environments.",
            'legal_references' => "<p>https://www.iso.org/standard/70568.html</p>",
            'recommendations' => "
            <p>Risk Assessment and Management: Conduct thorough risk assessments to identify and mitigate potential security and privacy risks associated with cloud-based health information systems.</p>
            <p>Data Protection: Implement strong data protection measures, including encryption, access controls, and data anonymization, to safeguard health information from unauthorized access and breaches.</p>            
            <p>Compliance with Regulations: Ensure compliance with relevant data protection and privacy regulations, industry standards, and contractual obligations when using cloud computing for health information systems.</p>            
            <p> Cloud Service Provider Evaluation: Select cloud service providers that demonstrate a strong commitment to security and privacy and have appropriate certifications and audits in place.</p>            
            <p>Incident Response and Recovery: Establish incident response and recovery plans to address security incidents promptly and minimize their impact on health information systems.</p>            
            <p>Data Interoperability: Address data interoperability challenges to enable seamless data exchange between different cloud-based health information systems and healthcare providers.</p>",
            'content' => "",
            'life_settings_id' => $lifeSettings->id,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);

        $requirements = NonFunctionalRequirements::whereIn('name', ['Security', 'Privacy', 'Reliability', "Performance", "Scalability", "Compliance"])->get();
        foreach($requirements as $requirement) {
            DB::table('legal_has_nfr_requirement')->insert([
                'legal_id' =>  $legalAndNormativeRequirement->id,
                'nfr_id' => $requirement->id,
            ]);
        }
        
    }
}




