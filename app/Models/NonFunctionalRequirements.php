<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
