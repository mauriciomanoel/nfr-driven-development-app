<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LifeSettings extends Model
{
    use HasFactory;

    protected $table = 'life_settings';
    public $timestamps = false; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function categories()
    {
        return $this->hasMany('App\Models\LifeSettingsCategories');
    }
}
