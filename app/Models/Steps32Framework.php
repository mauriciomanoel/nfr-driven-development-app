<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Steps32Framework extends Model
{
    use HasFactory;

    protected $table = 'steps3_2_framework';

    public function stakeholder()
    {
        return $this->belongsTo('App\Models\Stakeholders', 'stakeholder_id');
    }
}
