<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LifeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Life Settings AAL */
        DB::table('life_settings')->insert([  
            'name' => "Independent Living",
            'description' => "How technology can assist in normal daily life activities e.g. tasks at home,
            mobility, safety, agenda (memory help), etc. Main developments under this
            perspective are focused on assistance at home, namely for elderly living
            alone, which goes hand-in-hand with developments on smart homes.
            It includes services such as living status monitoring, with connection to care providers
            in case of any emergency, agenda manager to compensate for memory losses,
            companion and service robots, integration of intelligent home appliances, etc. Support
            outside home, namely in terms of mobility assistance, shopping assistance, and other daily life activities, is also considered.",
        ]);
        $lifeSettingsId = DB::getPdo()->lastInsertId();
        
        #1
        DB::table('life_settings_categories')->insert([  
            'name' => "Daily life assistance",
            'description' => "Provide a secure environment based on the utilization of environmental sensors assistive technology, and user friendly communications",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Home safety and care",
            'description' => "Environmental sensors and assistive technology, communication channels, companionship",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Personal activity management",
            'description' => "Meals and dietary help, shopping, agenda reminding, interaction with public institutions",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Other",
            'description' => "Other subcategory",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        #2
        DB::table('life_settings_categories')->insert([  
            'name' => "Supporting physical mobility",
            'description' => "Navigation support for mobile location, walking, driving, ..., and traveling), including services integration (e.g. integrated public transports)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Localization/positioning assistance",
            'description' => "(where am I, what is near me, which way to go), both indoor and outdoor",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Mobility and Transportation",
            'description' => "(Driving, Public transportation, walk with companion dog or robot, wheelchair)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        #######################################

        DB::table('life_settings')->insert([  
            'name' => "Health and Care in Life",
            'description' => "This life setting addresses how technology can assist in health-related activities (remote health monitoring, emergency assistance, sensing environments, exercise assistance, prescription reminding, etc).",
        ]);
        $lifeSettingsId = DB::getPdo()->lastInsertId();

        #1
        DB::table('life_settings_categories')->insert([  
            'name' => "Monitoring",
            'description' => "(Technological means for monitoring pleaple´s health condition, through sensorial information, looking for anomalies or out of pattern behaviors. The monitoring can be performed either at home or outdoors)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Sensorial supervision",
            'description' => "(wearable monitoring devices, self-monitoring, remote monitoring)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Chronic Diseases",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        #2
        DB::table('life_settings_categories')->insert([  
            'name' => "Caring and Intervention",
            'description' => "(Supply technological assistance in situations of illness, injury or other unhealthy)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Medication assistance",
            'description' => "(support to remember medication, medication dispenser, memory assistance)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Healthy Lifestyle intervention",
            'description' => "(Helping people to maintain healthy lifestyle: diets, physical exercise, etc.)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Healthcare management",
            'description' => "(clinical history, therapeutic plan management, teleconsultation)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        
        #3
        DB::table('life_settings_categories')->insert([  
            'name' => "Rehabilitation and Disabilities Compensation",
            'description' => "(Provide technological means to support the rehabilitation of functional limitations and disabilities compensation)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Physical compensation",
            'description' => "(sensorial disabilities compensation, motor disabilities assistance)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Neuro-cognitive compensation",
            'description' => "(compensations of mental disorder)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Rehabilitation",
            'description' => "(recovering or improving lost functions after an event, illness or injury that has caused functional disability)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);


        #######################################

        DB::table('life_settings')->insert([  
            'name' => "Occupation in Life",
            'description' => "This life setting addresses how technology can support the continuation of professional activities. The life setting of occupation in life can look very different for individuals, depending on the background work structure, sector, individual goals, capabilities, flexibility, opportunities, and functional ability",
        ]);
        $lifeSettingsId = DB::getPdo()->lastInsertId();

        #1
        DB::table('life_settings_categories')->insert([  
            'name' => "Ageing at Work",
            'description' => "(Facilitate continuation in workplace while going older)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Adjusted working space",
            'description' => "(adapted environment, ergonomics, light, robotic helper...",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Inter-generational relations",
            'description' => "(ex: young employees help senior employees to leverage technology while senior help young employees to gain knowhow)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        #2
        DB::table('life_settings_categories')->insert([  
            'name' => "Extending Professional Life",
            'description' => "(Facilitation of an active life after retirement)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Keeping links with former employers",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Freelancing and entrepreneurship",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Working in professional communities",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        
        #######################################

        DB::table('life_settings')->insert([  
            'name' => "Recreation in Life",
            'description' => "This life setting addresses how technology can facilitate socialization and participation of ageing citizens in social, leisure, learning, and even religious, cultural and political activities.",
        ]);
        $lifeSettingsId = DB::getPdo()->lastInsertId();


        #1
        DB::table('life_settings_categories')->insert([  
            'name' => "Socialization",
            'description' => "(Staying socially active through technological solutions that are geared toward social networking and community building, improving in this way quality of life reducing social isolation)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Participation in Real World",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Virtual Communities",
            'description' => "",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Social events management",
            'description' => "(Including outdoor activities and volunteering activities, time bank)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);

        #2
        DB::table('life_settings_categories')->insert([  
            'name' => "Entertainment",
            'description' => "(Amusement, diversions and distractions with the intention to give pleasure and supported by technological means)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Gaming",
            'description' => "(Brain stimulation games, online entertainment games (ex: bingo, cards))",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Cultural activities",
            'description' => "(Online reading and storytelling, Remote attendance to bands shows, cinema, theatre, etc)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Recreation activities",
            'description' => "(Specialized and remote gymnasiums (attending classes from home) and sports, etc)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);


        #3
        DB::table('life_settings_categories')->insert([  
            'name' => "Learning",
            'description' => "(Promotion and provision of training and education services through technological means)",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Remote Learning",
            'description' => "(Remote libraries access, painting, Internet, etc)",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Experiences exchanging",
            'description' => "(Remote teaching / consulting (highlight intergenerational relationships and the skills sharing))",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Knowledge sharing",
            'description' => "(Remote teaching / consulting (highlight intergenerational relationships and the skills sharing))",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire category.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to the entire subcategory.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);


        #######################################

        DB::table('life_settings')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to all Life Settings.",
        ]);
        $lifeSettingsId = DB::getPdo()->lastInsertId();
        #1
        DB::table('life_settings_categories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to all Life Settings.",
            'life_settings_id' => $lifeSettingsId,
        ]);
        $lifeSettingsCategoriesId = DB::getPdo()->lastInsertId();
        DB::table('life_settings_subcategories')->insert([  
            'name' => "Generic",
            'description' => "Can be applied to all Life Settings.",
            'life_settings_categories_id' => $lifeSettingsCategoriesId,
        ]);        
    }
}
