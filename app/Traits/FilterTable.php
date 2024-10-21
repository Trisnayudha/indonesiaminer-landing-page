<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait FilterTable
{
    /**
     * return array already filtered value
     *
     * @param $array
     * @return array|mixed
     */
    public static function siftArrayValue($array)
    {
        return (!empty($array) ? (in_array('All', $array) ? array_intersect($array, ['All']) : $array): []);
    }

    /**
     * return array
     *
     * @param $array
     * @return array|mixed
     */
    public static function getArrayValue($array)
    {
        return (!empty($array) ? (in_array('All', $array) ? [] : $array) : []);
    }

    /**
     * @param $page
     * @return mixed
     */
    public static function setPageDirectory($page)
    {
        if (!empty($page)) {
            Session::put('pDirectory', $page);
        }
        return $page;
    }

    /**
     * @return mixed|string
     */
    public static function getPageDirectory()
    {
        $page = Session::get('pDirectory');
        if (!empty($page)) {
            return $page;
        }
        return "";
    }

    /**
     * @param $page
     * @return mixed
     */
    public static function setPageEventJoin($page)
    {
        if (!empty($page)) {
            Session::put('pEventJoin', $page);
        }
        return $page;
    }

    /**
     * @return mixed|string
     */
    public static function getPageEventJoin()
    {
        $page = Session::get('pEventJoin');
        if (!empty($page)) {
            return $page;
        }
        return "";
    }

}
