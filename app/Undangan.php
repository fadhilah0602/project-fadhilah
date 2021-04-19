<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    public function undanganBagians()
    {
        return $this->hasMany('App\UndanganBagian');
    }

    public function undanganPegawais()
    {
        return $this->hasMany('App\UndanganPegawai');
    }
}
