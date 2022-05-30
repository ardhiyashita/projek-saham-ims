<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundamental extends Model
{
    use HasFactory;
    protected $guards = [];
    protected $fillable = ['id', 'emiten_id', 'eps', 'per', 'pbv', 'roe', 'dy', 'der'];

    public function emiten()
    {
        return $this->belongsTo(Emiten::class, 'emiten_id', 'id');
    }
}
