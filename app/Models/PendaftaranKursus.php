<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKursus extends Model
{
    use HasFactory;

    protected $guarded = ['pendaftaran_id'];
    protected $primaryKey = 'pendaftaran_id';

    const UPDATED_AT = null;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }

    public function kursus()
    {
        return $this->belongsTo('App\Models\Kursus', 'kursus_id', 'kursus_id');
    }
}
