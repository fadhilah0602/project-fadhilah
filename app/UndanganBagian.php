<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UndanganBagian extends Model
{
    public function undangan()
    {
        return $this->belongsTo('App\Undangan',  'undangan_id','id');
    }

    public function bagian()
    {
        return $this->belongsTo('App\Bagian',  'bagian_id','id');
    }
}
