<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stakeholders extends Model
{
    use HasFactory;

    protected $table = 'stakeholders';
    public $timestamps = true; 
    // /**
    //  * Get the notes for the status.
    //  */
    public function analysis()
    {
        return $this->hasMany('App\Models\StakeholderAnalysis');
    }
    
}
