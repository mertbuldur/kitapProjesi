<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazarlar extends Model
{
    protected  $guarded = [];

    static function getField($id,$field)
    {
        $c = Yazarlar::where('id','=',$id)->count();

        if($c!=0)
        {
            $w = Yazarlar::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else
        {
            return "Silinmiş Yazar";
        }
    }
}
