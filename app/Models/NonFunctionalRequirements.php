<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\LegalRequirements;

class NonFunctionalRequirements extends Model
{

    use HasFactory;

    protected $table = 'non_functional_requirement';

    /**
     * Get the User that owns the Projects.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }

    /**
     * Get the User that owns the Projects.
     */
    public function mainRequirement()
    {
        return $this->hasMany('App\Models\Requirements', 'characteristics_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Requirements', 'characteristics_id');
    }

    public function legalRequirements(){
        return $this->belongsToMany(LegalRequirements::class, "legal_requirements_non_functional_requirements", "legal_id", "nfr_id");
    }
}
