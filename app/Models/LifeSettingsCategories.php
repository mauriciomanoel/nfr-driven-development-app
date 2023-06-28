<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LifeSettingsCategories extends Model
{
    use HasFactory;

    protected $table = 'life_settings_categories';
    public $timestamps = false; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function lifeSettings()
    {
        return $this->belongsTo('App\Models\LifeSettings', 'life_settings_id');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Models\LifeSettingsSubcategories');
    }
}
