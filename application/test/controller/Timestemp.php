<?php


namespace app\test\controller;


class Timestemp
{
    public function index ()
    {
        echo 'das';
    }
    public function getDiffTime ($recordtime)
    {
        $minute = 60;
        $hour   = 60 * $minute;
        $day    = 24 * $hour;
        $now    = time();
        $diff   = now - $recordtime;
        $result = '';
        if($diff < 0) {
            return $result;
        }
        $weekR = diff/(7*day);
        $dayC  = diff/$day;
        $hourC = diff/$hour;
        $minC  = diff/$minute;
        if($weekR >= 1){
            $yearA = date('YYYY',$now);
            $yearB = date('YYYY',$recordtime);
            if($yearA>$yearB) {
                echo '1';
            } else {
                return '0';
            }
        }
        echo $now;
    }
}