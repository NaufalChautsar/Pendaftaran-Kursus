<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $guarded = ['kursus_id'];
    protected $primaryKey ='kursus_id';

    public function pendaftaran()
    {
        return $this->hasMany('App\Models\PendaftaranKursus', 'kursus_id', 'kursus_id');
    }

    public $timestamps = false;
}
