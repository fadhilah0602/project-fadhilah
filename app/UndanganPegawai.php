<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UndanganPegawai extends Model
{
    public function undangan()
    {
        return $this->belongsTo('App\Undangan',  'undangan_id','id');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai',  'pegawai_id','id');
    }
}
