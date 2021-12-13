<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public function nominations()
    {
        return $this->hasMany(Nomination::class, 'designation_id', 'id');
    }
}
