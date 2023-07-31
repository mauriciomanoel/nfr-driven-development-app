<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Steps2Framework extends Model
{

    use HasFactory;

    protected $table = 'steps2_framework';

    /**
     * 
     */
    public function stakeholder()
    {
        return $this->belongsTo('App\Models\Stakeholders', 'stakeholder_id');
    }
}
