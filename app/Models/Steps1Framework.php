<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\LegalRequirements;

class Steps1Framework extends Model
{

    use HasFactory;

    protected $table = 'steps1_framework';
    

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
    public function legalRequirement()
    {
        return $this->belongsTo('App\Models\LegalRequirements', 'legal_requirements_id');
    }
}
