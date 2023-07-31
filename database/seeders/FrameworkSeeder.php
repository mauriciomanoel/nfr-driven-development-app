<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StepsFramework;


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

    }
}





