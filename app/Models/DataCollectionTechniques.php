<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataCollectionTechniques extends Model
{

    use HasFactory;

    protected $table = 'data_collection_techniques';

    // /**
    //  * Get the User that owns the Projects.
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    // }

    // /**
    //  * Get the Status that owns the Projects.
    //  */
    // public function lifeSettings()
    // {
    //     return $this->belongsTo('App\Models\LifeSettings', 'life_settings_id');
    // }
}
