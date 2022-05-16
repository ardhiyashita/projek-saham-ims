<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saham extends Model
{
    use HasFactory;

    protected $guards = [];
    protected $fillable = ['id', 'emiten_id', 'tanggal', 'open', 'high', 'low', 'close', 'volume'];

    public function emiten()
    {
        return $this->belongsTo(Emiten::class, 'emiten_id', 'id');
    }
}
