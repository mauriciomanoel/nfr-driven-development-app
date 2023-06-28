<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projects;
use App\Models\LifeSettingsSubcategories;




class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email' , '=' , 'mauriciomanoel@gmail.com' )->first();   
        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Home Safety and Care' )->first();
     
        $artifact = Projects::create([  
            'title' => "Rustic home monitoring system",
            'description' => "An accident monitoring system for the elderly for rustic homes located in the countryside.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Remote Learning' )->first();
     
        $artifact = Projects::create([  
            'title' => "Remore Learning System",
            'description' => "An Elderly Support System in Learning New Languages using your smartphone that adapts to their daily needs.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Sensorial supervision' )->first();
     
        $artifact = Projects::create([  
            'title' => "Medication Control System",
            'description' => "An Elderly support to medication control for Hypertension and Cholesterol with adaptation for urgent tasks.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => true,
        ]);


        $user = User::where('email' , '=' , 'admin@rs4aal.site' )->first();   
        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Generic' )->first();

        $artifact = Projects::create([  
            'title' => "Autentication System",
            'description' => "An authentication system adapted for elderly people with motor problems.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

        $artifact = Projects::create([  
            'title' => "Position System",
            'description' => "A positioning system adapted for elderly people in wheelchairs.",
            'life_settings_id' => $lifeSettingsSubcategories->category->lifeSettings->id,
            'life_settings_category_id' => $lifeSettingsSubcategories->category->id,
            'life_settings_subcategory_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
            'current' => false,
        ]);

    }
}





