<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $fillable = ['sumbang_saran_id','karyawan_id','nilai'];

    public function sumbangsaran(){
        return $this->belongsTo(SumbangSaran::class,'sumbang_saran_id','id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }
}
