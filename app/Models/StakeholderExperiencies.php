<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StakeholderExperiencies extends Model
{
    use HasFactory;

    protected $table = 'stakeholder_experiencies';
    public $timestamps = true; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function stakeholders()
    {
        return $this->belongsTo('App\Models\Stakeholders', 'stakeholders_id');
    }
}
