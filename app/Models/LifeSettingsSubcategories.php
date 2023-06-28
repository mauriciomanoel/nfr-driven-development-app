<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LifeSettingsSubcategories extends Model
{
    use HasFactory;

    protected $table = 'life_settings_subcategories';
    public $timestamps = false; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function category()
    {
        return $this->belongsTo('App\Models\LifeSettingsCategories', 'life_settings_categories_id');

    }
}
