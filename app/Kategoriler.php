<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected  $guarded = [];

    static function getField($id,$field)
    {
        $c = Kategoriler::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = Kategoriler::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else
        {
            return "silinmiş kategori";
        }
    }
}
