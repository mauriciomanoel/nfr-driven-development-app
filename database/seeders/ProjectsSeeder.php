<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projects;
use App\Models\LifeSettingsSubcategories;
use App\Models\StepsFrameworkProject;
use App\Models\StepsFramework;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stepsFramework = StepsFramework::get();
        $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();   
        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Home Safety and Care' )->first();
     
        $project = Projects::create([  
            'title' => "Sistema de monitoramento de casa rústica",
            'description' => "Sistema de monitoramento de acidentes de idosos em residências rústicas localizadas na zona rural.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);
        
        foreach($stepsFramework as $stepFramework) {
            StepsFrameworkProject::create([  
                'steps_framework_id' => $stepFramework->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
        }

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Remote Learning' )->first();
     
        $project = Projects::create([  
            'title' => "Sistema de Aprendizagem Remota",
            'description' => "Um Sistema de Apoio ao Idoso na Aprendizagem de Novos Idiomas através do seu smartphone que se adapta às suas necessidades diárias.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        foreach($stepsFramework as $stepFramework) {
            StepsFrameworkProject::create([  
                'steps_framework_id' => $stepFramework->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
        }

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Sensorial supervision' )->first();
     
        $project = Projects::create([  
            'title' => "Sistema de Gestão de Saúde",
            'description' => "Apoio ao Idoso no controle de medicamentos e gestão de atividades.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => true,
        ]);

        foreach($stepsFramework as $stepFramework) {
            StepsFrameworkProject::create([  
                'steps_framework_id' => $stepFramework->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
        }

        // $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();   
        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Generic' )->first();

        $project = Projects::create([  
            'title' => "Sistema de Autenticação",
            'description' => "Um sistema de autenticação adaptado para idosos com problemas motores.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        foreach($stepsFramework as $stepFramework) {
            StepsFrameworkProject::create([  
                'steps_framework_id' => $stepFramework->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
        }

        $project = Projects::create([  
            'title' => "Sistema de Posição",
            'description' => "Um sistema de posicionamento adaptado para pessoas idosas em cadeiras de rodas.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        foreach($stepsFramework as $stepFramework) {
            StepsFrameworkProject::create([  
                'steps_framework_id' => $stepFramework->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
        }

    }
}





