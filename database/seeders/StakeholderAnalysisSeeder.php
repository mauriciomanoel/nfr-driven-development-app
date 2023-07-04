<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projects;
use App\Models\StakeholderAnalysis;
use App\Models\Stakeholders;





class StakeholderAnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $finalUsers = Stakeholders::create([  
            'name' => "Usuários Finais",
            'description' => "O grupo de usuários finais é composto por idosos que utilizarão o sistema AAL",
        ]);

        $familyAndCaregiver = Stakeholders::create([  
            'name' => "Familiares e Cuidadores",
            'description' => "Profissionais de saúde desempenham um papel fundamental no uso e na adoção do sistema AAL.",
        ]);

        $HealthProfessionals = Stakeholders::create([  
            'name' => "Profissionais de Saúde",
            'description' => "Profissionais de saúde desempenham um papel fundamental no uso e na adoção do sistema AAL.",
        ]);

        $developersAndEngineers = Stakeholders::create([  
            'name' => "Desenvolvedores e Engenheiros de Software",
            'description' => "Os desenvolvedores e engenheiros de software são responsáveis pelo projeto, implementação e manutenção do sistema AAL",
        ]);

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $finalUsers->id,
            'description' => "O grupo de usuários finais é composto por idosos que utilizarão o sistema AAL. Eles são os principais beneficiários do sistema, buscando melhorar sua qualidade de vida, segurança e independência.",
            'identified_needs' => "<p>Monitoramento remoto de saúde e bem-estar.</p><p>Suporte para atividades diárias, como lembretes de medicação e assistência na realização de tarefas domésticas.</p><p>Comunicação fácil com cuidadores e familiares.</p><p>Interface intuitiva e de fácil uso, considerando as habilidades digitais variadas dos usuários.</p><p>Privacidade e segurança dos dados pessoais.</p>",
            'expectations' => "<p>Acesso fácil e rápido às funcionalidades do sistema.</p><p>Disponibilidade de suporte técnico para solucionar eventuais problemas.</p><p>Interface de usuário amigável, com ícones claros e texto legível.</p><p>Funcionalidades adaptáveis e personalizáveis para atender às preferências individuais.</p><p>Alertas e notificações claras e compreensíveis.</p>",
            'experiences' => "<p>Alguns usuários finais têm experiência prévia limitada com tecnologia, enquanto outros têm maior familiaridade com dispositivos eletrônicos.</p>",
        ]);

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $HealthProfessionals->id,
            'description' => "Profissionais de saúde desempenham um papel fundamental no uso e na adoção do sistema AAL. Eles são responsáveis por monitorar a saúde dos usuários finais e fornecer suporte adequado.",
            'identified_needs' => "<p>Receber dados de monitoramento em tempo real para acompanhamento e intervenção eficaz.</p><p>Interface intuitiva que permita análise rápida e fácil dos dados coletados.</p><p>Compatibilidade com os sistemas de registros médicos eletrônicos existentes.</p><p>Privacidade e segurança dos dados de saúde.</p><p>Necessidade de soluções que sejam fáceis de integrar às práticas clínicas existentes</p>",
            'expectations' => "<p>Integração perfeita com o fluxo de trabalho existente.</p><p>Relatórios claros e concisos para auxiliar na tomada de decisões clínicas.</p><p>Funcionalidades personalizadas para atender às necessidades específicas de cada profissional de saúde.</p><p>Facilidade de uso e aprendizado para evitar sobrecarga de trabalho.</p>",
            'experiences' => "<p>Experiência variada no uso de sistemas de informação em saúde.</p>
            <p>Já trabalhou com pesquisas para sistemas de saúde.</p>",
        ]);

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $finalUsers->id,
            'description' => "O grupo de usuários finais é composto por idosos que utilizarão o sistema AAL. Eles são os principais beneficiários do sistema, buscando melhorar sua qualidade de vida, segurança e independência.",
            'identified_needs' => "",
            'expectations' => "",
            'experiences' => "",
        ]);

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $developersAndEngineers->id,
            'description' => "Os desenvolvedores e engenheiros de software são responsáveis pelo projeto, implementação e manutenção do sistema AAL.",
            'identified_needs' => "<p>Especificações claras dos requisitos do sistema.</p><p>Interface de programação de aplicativos (APIs) bem documentada e de fácil utilização.</p><p>Acesso a recursos e ferramentas de desenvolvimento adequados.</p><p>Testes e validação rigorosos para garantir a qualidade do sistema.</p>",
            'expectations' => "<p>Colaboração eficaz com outros membros da equipe de desenvolvimento.</p><p>Padrões de codificação e boas práticas de desenvolvimento bem definidos.</p><p>Suporte contínuo para solução de problemas técnicos.</p><p>Disponibilidade de materiais de referência e documentação atualizada.</p>",
            'experiences' => "<p>Experiência prévia no desenvolvimento de sistemas AAL ou de saúde.</p>
            <p>Conhecimento de linguagens de programação e tecnologias relevantes.</p>
            ",
        ]);

        

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $finalUsers->id,
            'description' => "O grupo de usuários finais é composto por idosos que utilizarão o sistema AAL. Eles são os principais beneficiários do sistema, buscando melhorar sua qualidade de vida, segurança e independência.",
            'identified_needs' => "<p>Monitoramento da saúde e segurança em tempo real.</p><p>Suporte para atividades diárias, como alimentação, higiene pessoal e mobilidade.</p><p>Comunicação fácil e acessível com familiares e profissionais de saúde.</p><p>Promoção do bem-estar emocional e social.</p>",
            'expectations' => "<p>Tecnologia intuitiva e fácil de usar, mesmo para usuários com pouca experiência tecnológica.</p><p>Personalização do sistema de acordo com suas necessidades individuais.</p><p>Privacidade e segurança dos dados pessoais.</p><p>Redução da dependência de cuidadores e profissionais de saúde.</p>",
            'experiences' => "<p>Adaptação a novas tecnologias pode ser desafiadora para alguns usuários finais.</p><p>Experiência variada com dispositivos móveis e aplicativos, mas geralmente com um nível básico de conhecimento.</p>",
        ]);


        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $familyAndCaregiver->id,
            'description' => "A família e o cuidador do idoso",
            'identified_needs' => "<p>Monitoramento remoto das condições de saúde dos usuários.</p><p>Comunicação fácil e rápida com os usuários e outros stakeholders.</p><p>Acesso a informações relevantes sobre o bem-estar e atividades dos usuários.</p><p>Suporte emocional e orientações para cuidados.</p>",
            'expectations' => "<p>Tecnologia confiável que forneça informações precisas e em tempo real.</p><p>Comunicação eficiente e acessível com os usuários e outros membros da equipe de cuidados.</p><p>Facilidade de uso e interface intuitiva.</p><p>Colaboração com os profissionais de saúde para um cuidado coordenado.</p>",
            'experiences' => "<p>Diversidade de níveis de familiaridade e habilidades tecnológicas entre os familiares e cuidadores.</p><p>Alguns podem ter experiência limitada com tecnologia, enquanto outros podem estar mais familiarizados com dispositivos móveis e aplicativos.</p>",
        ]);


        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $HealthProfessionals->id,
            'description' => "Profissionais de saúde desempenham um papel fundamental no uso e na adoção do sistema AAL. Eles são responsáveis por monitorar a saúde dos usuários finais e fornecer suporte adequado.",
            'identified_needs' => "<p>Acesso a informações de saúde dos usuários em tempo real.</p><p>Comunicação eficiente com os usuários, familiares e outros profissionais de saúde.</p><p>Monitoramento remoto de pacientes para acompanhamento e intervenção adequada.</p><p>Integração de dados e histórico médico para tomada de decisões informadas.</p>",
            'expectations' => "<p>Tecnologia que facilite o monitoramento e o compartilhamento de informações entre os membros da equipe de cuidados.</p><p>Interfaces amigáveis e de fácil navegação.</p><p>Segurança dos dados do paciente e conformidade com as regulamentações de privacidade.</p><p>Integração com sistemas de registro eletrônico de saúde existentes.</p>",
            'experiences' => "</p>Profissionais de saúde têm níveis variados de experiência e familiaridade com o uso de tecnologia em suas práticas.</p></p>Alguns podem ter experiência significativa com sistemas eletrônicos de saúde, enquanto outros podem precisar de mais suporte e treinamento.</p>",
        ]);

        StakeholderAnalysis::create([  
            'users_id' => 1,
            'stakeholders_id' => $developersAndEngineers->id,
            'description' => "Os desenvolvedores e engenheiros de software são responsáveis pelo projeto, implementação e manutenção do sistema AAL.",
            'identified_needs' => "<p>Entender as necessidades e expectativas dos usuários finais, familiares e profissionais de saúde.</p><p>Desenvolvimento de soluções tecnológicas escaláveis e confiáveis.</p><p>Garantir a usabilidade e a acessibilidade das soluções desenvolvidas.</p><p>Manter-se atualizado com as tendências e inovações em tecnologia de AAL.</p>",
            'expectations' => "<p>Colaboração e feedback contínuos dos outros stakeholders.</p><p>Desenvolvimento de soluções personalizadas e flexíveis.</p><p>Implementação de medidas de segurança e privacidade robustas.</p><p>Suporte técnico para solução de problemas e atualizações regulares.</p>",
            'experiences' => "<p>Desenvolvedores e engenheiros de software têm um alto nível de experiência e conhecimento técnico.<p><p>Experiência com tecnologias de assistência ao ambiente e saúde digital.</p>",
        ]);

    }
}





