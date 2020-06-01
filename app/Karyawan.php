<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $fillable = ['nik','nama','bagian_id','ext_id'];

    public function sumbangsaran(){
        return $this->hasMany(SumbangSaran::class,'karyawan_id');
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class,'karyawan_id');
    }

    public function bagian(){
        return $this->belongsTo(Bagian::class,'bagian_id','id');
    }

    public function ext(){
        return $this->belongsTo(Ext::class,'ext_id','id');
    }
}
