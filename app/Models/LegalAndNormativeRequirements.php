<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalAndNormativeRequirements extends Model
{
    use HasFactory;

    protected $table = 'legal_and_normative_requirement';
  
        /**
     * Get the User that owns the Projects.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }

    // // /**
    // //  * Get the notes for the status.
    // //  */
    // public function nonFunctionRequeriments()
    // {
    //     return $this->belongsToMany('App\Models\NonFunctionalRequirements');
    // }

    /**
     * The users that belong to the role.
     */
    // public function nonFunctionRequeriments(): BelongsToMany
    // {
    //     return $this->belongsToMany(NonFunctionalRequirements::class, 'legal_has_nfr_requirement');
    // }
}
