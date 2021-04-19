<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function bag()
    {
        return $this->belongsTo('App\Bagian',  'bagian_id','id');
    }
}
