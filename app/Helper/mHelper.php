<?php
namespace App\Helper;
class mHelper
{
    static  function permalink($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }


    static function largeImage($image)
    {
        $imageExplode = explode('/',$image);
        $filename = end($imageExplode);
        $key = key($imageExplode);
        unset($imageExplode[$key]);
        $implodeImage = implode('/',$imageExplode);
        return $implodeImage."/large/".$filename;
    }
}