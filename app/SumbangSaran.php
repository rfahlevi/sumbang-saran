<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumbangSaran extends Model
{
    protected $table ="sumbang_saran";
    protected $fillable = ['karyawan_id','judul','foto','kondisi_awal','kondisi_akhir','manfaat','periode'];

    public function penilaian(){
        return $this->hasMany(Penilaian::class,'sumbang_saran_id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }
}
