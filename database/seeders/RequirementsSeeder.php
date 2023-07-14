<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Requirements;


class RequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();   
        Requirements::create([  
            'name' => "Adaptivity",
            'description' => "Is the software capability to modify its own behaviour in response to changes in its operating environment (i.e., anything observable by the software system, such as end-user input, external hardware devices and sensors, or program instrumentation)",
            'model_quality' => "Product quality",
            'source' => "P. Oreizy et al., \"An architecture-based approach to self-adaptive software,\" in IEEE Intelligent Systems and their Applications, vol. 14, no. 3, pp. 54-62, May-June 1999, doi: 10.1109/5254.769885.",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        $requeriment = Requirements::create([  
            'name' => "Compatibility",
            'description' => "degree to which a product, system or component can exchange information with other products, systems or components, and/or perform its required functions, while sharing the same hardware or software environment.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        Requirements::create([  
            'name' => "Interoperability",
            'description' => "degree to which two or more systems, products or components can exchange information and use the information that has been exchanged.",
            'model_quality' => "Product quality",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => $requeriment->id,
            'users_id' => $user->id,
        ]);

        $requeriment = Requirements::create([  
            'name' => "Context coverage",
            'description' => "degree to which a product or system can be used with effectiveness, efficiency, freedom from risk and satisfaction in both specified contexts of use and in contexts beyond those initially explicitly identified.",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        Requirements::create([  
            'name' => "Flexibility",
            'description' => "degree to which a product or system can be used with effectiveness, efficiency, freedom from risk and satisfaction in contexts beyond those initially specified in the requirements
Note 1 to entry: Flexibility can be achieved by adapting a product (see 4.2.8.1) for additional user groups, tasks and cultures.
Note 2 to entry: Flexibility enables products to take account of circumstances, opportunities and individual preferences that had not been anticipated in advance.
Note 3 to entry: If a product is not designed for flexibility, it might not be safe to use the product in unintended contexts.
Note 4 to entry: Flexibility can be measured either as the extent to which a product can be used by additional types of users to achieve additional types of goals with effectiveness, efficiency, freedom from risk and satisfaction in additional types of contexts of use, or by a capability to be modified to support adaptation for new types of users, tasks and environments, and suitability for individualization as defined in ISO 9241-110.",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => $requeriment->id,
            'users_id' => $user->id,
        ]);

        $requeriment = Requirements::create([  
            'name' => "Effectiveness",
            'description' => "accuracy and completeness with which users achieve specified goals.",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        Requirements::create([  
            'name' => "Robustness",
            'description' => "The degree to which the information system proceeds as usual even after an interruption.",
            'model_quality' => "Quality in use",
            'source' => "Paradkar, Sameer. Mastering Non-Functional Requirements. Packt Publishing Ltd, 2017.",
            'requirements_id' => $requeriment->id,
            'users_id' => $user->id,
        ]);

        $requeriment = Requirements::create([  
            'name' => "Efficiency",
            'description' => "resources expended in relation to the accuracy and completeness with which users achieve goals",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        $requeriment = Requirements::create([  
            'name' => "Freedom from risk",
            'description' => "degree to which a product or system mitigates the potential risk to economic status, human life, health, or the environment
            Note 1 to entry: Risk is a function of the probability of occurrence of a given threat and the potential adverse consequences of that threat's occurrence.",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => 0,
            'users_id' => $user->id,
        ]);

        Requirements::create([  
            'name' => "Health and safety risk mitigation",
            'description' => "degree to which a product or system mitigates the potential risk to people in the intended contexts of use.",
            'model_quality' => "Quality in use",
            'source' => "ISO/IEC 25010:2011",
            'requirements_id' => $requeriment->id,
            'users_id' => $user->id,
        ]);
    
    }
}





