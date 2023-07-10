<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class NonFunctionalRequirementsForSpecification extends Model
{

    use HasFactory;

    protected $table = 'non_functional_requirement_for_specification';

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
    public function project()
    {
        return $this->hasMany('App\Models\Project', 'project_id');
    }

    /**
     * Get the User that owns the Projects.
     */
    public function nonFunctionalRequirement()
    {
        return $this->hasMany('App\Models\NonFunctionalRequirements', 'nfr_id');
    }

}
