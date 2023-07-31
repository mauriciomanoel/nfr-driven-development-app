<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Steps31Framework extends Model
{
    use HasFactory;

    protected $table = 'steps3_1_framework';

    /**
     * 
     */
    public function dataCollectionTechniques()
    {
        return $this->belongsTo('App\Models\DataCollectionTechniques', 'data_collection_technique_id');
    }
}
