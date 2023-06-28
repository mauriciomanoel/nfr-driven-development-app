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

        $functionalSuitabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Functional Completeness",
            'description' => "Refere-se ao grau em que o conjunto de funções do sistema abrange todas as tarefas e objetivos especificados. Isso significa que todas as funcionalidades necessárias para realizar as atividades planejadas devem estar presentes.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar uma análise abrangente das necessidades e requisitos dos usuários, identificando todas as tarefas e objetivos que o sistema deve abranger.</p><p>Validar as funcionalidades implementadas por meio de testes e validações com os usuários, verificando se todas as tarefas e objetivos foram contemplados.</p>",
            'content' => "",
            'characteristics_id' => $functionalSuitabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        $functionalSuitabilityRequeriment = NonFunctionalRequirements::create([  
            'name' => "Functional Correctness",
            'description' => "Refere-se ao grau em que um sistema fornece resultados corretos com o nível necessário de precisão. Isso significa que o sistema deve produzir os resultados esperados, sem erros ou inconsistências.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011 Systems and software engineering",
            'recommendations' => "<p>Realizar testes rigorosos e verificações de validação para confirmar que os resultados fornecidos pelo sistema são precisos e corretos.</p><p>Envolver os usuários finais nos processos de testes e validações para obter feedback sobre a corretude dos resultados.</p>",
            'content' => "",
            'characteristics_id' => $functionalSuitabilityRequeriment->id,
            'users_id' => $user->id,
        ]);

        $functionalSuitabilityRequeriment = NonFunctionalRequirements::create([  
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





