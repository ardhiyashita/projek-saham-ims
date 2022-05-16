<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapSaham extends Model
{
    use HasFactory;

    protected $guards = [];
    protected $fillable = ['id', 'emiten_id', 'tanggal', 'open', 'close', 'sumber'];

    public function emiten()
    {
        return $this->belongsTo(Emiten::class, 'emiten_id', 'id');
    }
}
