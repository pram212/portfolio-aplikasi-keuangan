<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $guarded=[];

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
