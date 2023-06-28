<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirements extends Model
{

    use HasFactory;

    protected $table = 'requirements';

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
        return $this->hasMany('App\Models\Requirements', 'requirements_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Requirements', 'requirements_id');
    }
}
