<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Steps5Framework extends Model
{
    use HasFactory;

    protected $table = 'steps5_framework';

    /**
     * Get the User that owns the Projects.
     */
    public function nonFunctionalRequirement()
    {
        return $this->belongsTo('App\Models\NonFunctionalRequirements', 'nfr_id');
    }
}
