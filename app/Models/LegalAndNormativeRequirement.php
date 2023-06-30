<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalAndNormativeRequirement extends Model
{
    use HasFactory;

    protected $table = 'legal_and_normative_requirement';
    public $timestamps = false; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function nonFunctionRequeriments()
    {
        return $this->hasMany('App\Models\NonFunctionalRequirements');
    }
}
