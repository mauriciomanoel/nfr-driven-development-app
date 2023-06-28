<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artifacts extends Model
{

    use HasFactory;

    protected $table = 'artifacts';

    // /**
    //  * Get the User that owns the Notes.
    //  */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }

    // /**
    //  * Get the Status that owns the Notes.
    //  */
    public function lifeSettingsSubcatetory()
    {
        return $this->belongsTo('App\Models\LifeSettingsSubcategories', 'life_settings_subcategories_id');
    }
}
