<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domains extends Model
{
    use HasFactory;

    protected $table = 'domains';
    public $timestamps = false; 
    /**
     * Get the Domain for the SubDomain.
     */
    public function subdomains()
    {
        return $this->hasMany('App\Models\Subdomains');
    }
}
