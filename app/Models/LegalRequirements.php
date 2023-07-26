<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalRequirements extends Model
{
    use HasFactory;

    protected $table = 'legal_requirements';
  
        /**
     * Get the User that owns the Projects.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }

    public function nonFunctionRequeriments()
    {
        return $this->belongsToMany(NonFunctionalRequirements::class, "legal_requirements_non_functional_requirements", "legal_id", "nfr_id");
    }

    // // /**
    // //  * Get the notes for the status.
    // //  */
    // public function nonFunctionRequeriments()
    // {
    //     return $this->belongsToMany('App\Models\NonFunctionalRequirements');
    // }

}
