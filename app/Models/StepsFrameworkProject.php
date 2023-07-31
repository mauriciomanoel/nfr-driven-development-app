<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StepsFrameworkProject extends Model
{

    use HasFactory;

    protected $table = 'steps_framework_project';

    // /**
    //  * Get the User that owns the Projects.
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    // }

    /**
     * Get the Status that owns the Projects.
     */
    public function StepsFramework()
    {
        return $this->belongsTo('App\Models\StepsFramework', 'steps_framework_id');
    }
}
