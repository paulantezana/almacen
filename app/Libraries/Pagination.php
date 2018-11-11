<?php

namespace App\Libraries;

class Pagination{
    public static function getPagination(int $total, int $current = 1, int $interval = 5) : array {
        $pages = intval(ceil($total / $interval));
        $current = $current > $pages ? $pages : $current;
        $current = $current == 0 ? 1 : $current;

        $page = [
            'pages'      => $pages,
            'total'=>$total,
            'start'     => ($current - 1) * $interval,
            'end'       => $interval,

            'current'    => $current,
            'interval' => $interval;
        ];
        return $page;
    }
}