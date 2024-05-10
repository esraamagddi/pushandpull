<?php
namespace helpers;
class Str{
     
        public static function limit($str)
        {
            if(strlen($str)>70)
            {
                $str=substr($str,offset:0,length:70);
            }

            return $str;




        }
}