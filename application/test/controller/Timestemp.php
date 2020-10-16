<?php


namespace app\test\controller;


class Timestemp
{
    public function index ()
    {
        return json([
                'dsa'   => time(),
                'dsad'  => date('Y:m:d H:i:s',time()),
        ]
        );
    }
    /**
     * 根据客户端的时间信息得到发表的时间格式
     * 刚刚，多少分钟前，多少小时前，昨天，月日，年月日
     * @param $recordtime 时间戳
     * @return false|string 时间格式
     * @time  2020/09/29 20:20
     */
    public function getDiffTime ($recordtime)
    {
        $minute = 60;
        $hour = 60 * $minute;
        $day = 24 * $hour;
        $now = time();
        $b   = time();
        $diff = $now - $recordtime;
        $result = '';
        if ($diff < 0) {
            return $result;
        }
        $yearA = date('Y', $now);
        $yearB = date('Y', $recordtime);
        $weekR = intval($diff / (7 * $day));
        $dayC  = intval($diff / $day);
        $hourC = intval($diff / $hour);
        $minC  = intval($diff / $minute);
        if ($weekR >= 1) {
            $formate = 'm-d H:i';
            if ($yearA > $yearB) {
                $formate = 'Y-m-d H:i';
            }
            return date($formate,$recordtime);
        } elseif ($dayC == 1 || ($hourC < 24 && date('d',$recordtime) != date('d',$now))) {
            $result = '昨天'.date('H:i',$recordtime);
            return $result;
        } elseif ($dayC==2||($hourC >= 24 && $hourC < 48)) {
            $result = "前天".date('H:i',$recordtime);
            return $result;
        } elseif ($dayC>1) {
            $formate = 'm-d H:i';
            if ($yearA > $yearB) {
                $formate = 'Y-m-d H:i';
            }
            return date($formate,$recordtime);
        } elseif ($hourC >= 1) {
            $result = $hourC.'小时前';
            return $result;
        } elseif ($minC >= 1) {
            $result = $minC.'分钟前';
            return $result;
        } else {
            $result = '刚刚';
            return $result;
        }
    }
}