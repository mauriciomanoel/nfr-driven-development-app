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

        $user = User::where('email' , '=' , 'admin@rs4aal.site' )->first();
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



        
    }
}




