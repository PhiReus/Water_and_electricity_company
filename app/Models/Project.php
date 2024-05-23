<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_day', 'end_day', 'contractor_id', 'description', 'status', 'image', 'construction_site'];

    public function contractor() {
        return $this->belongsTo(Contractor::class, 'contractor_id', 'id');
    }
}
