<?php

if (!function_exists('screenLoad'))
{
    /**
     * screen loading
     *
     * @return bool
     */
    function screenLoad()
    {
        return App\Helpers\General::screenLoad();
    }
}

if (!function_exists('checkScreenLoad'))
{
    /**
     * check screen loading
     *
     * @return bool
     */
    function checkScreenLoad()
    {
        return App\Helpers\General::checkScreenLoad();
    }
}

if (!function_exists('RandomCode'))
{
    /**
     * return random code string
     *
     * @param array $not_in
     * @param int $length
     * @param bool $capital
     * @return string
     */
    function RandomCode($not_in = [], $length = 6, $capital = true)
    {
        return App\Helpers\General::RandomCode($not_in, $length, $capital);
    }
}

if (!function_exists('getSessionDelegate'))
{
    /**
     * return session delegate
     *
     * @param $value
     * @return mixed
     */
    function getSessionDelegate($value) {
        return App\Helpers\General::getSessionDelegate()->$value;
    }
}

if (!function_exists('sliptWord'))
{
    /**
     * split word
     *
     * @param $word
     * @param int $get
     * @return mixed
     */
    function sliptWord($word, $get = 0) {
        return App\Helpers\General::sliptWord($word, $get);
    }
}

if (!function_exists('makeSlug'))
{
    /**
     * make slug
     *
     * @param $title
     * @return string
     */
    function makeSlug($title)  {
        return App\Helpers\General::makeSlug($title);
    }
}

if (!function_exists('fill_chunck'))
{
    /**
     * @param $array
     * @param $parts
     * @return array
     */
    function fill_chunck($array, $parts)  {
        return App\Helpers\General::fill_chunck($array, $parts);
    }
}

if (!function_exists('alternate_chunck'))
{
    /**
     * @param $array
     * @param $parts
     * @return array
     */
    function alternate_chunck($array, $parts)  {
        return App\Helpers\General::alternate_chunck($array, $parts);
    }
}

if (!function_exists('multiple_array'))
{
    /**
     * @param $array
     * @param $size
     * @return array
     */
    function multiple_array($array, $size)  {
        return App\Helpers\General::multiple_array($array, $size);
    }
}

if (!function_exists('dateArray'))
{
    /**
     * @param $start
     * @param $end
     * @return array
     * @throws Exception
     */
    function dateArray($start, $end)  {
        return App\Helpers\General::dateArray($start, $end);
    }
}

if (!function_exists('ToOrdinal'))
{
    /**
     * @param $n
     * @return string|void
     */
    function ToOrdinal($n) {
        return App\Helpers\General::ToOrdinal($n);
    }
}

if (!function_exists('menuTag'))
{
    /**
     * @param $name
     */
    function menuTag($name) {
        return App\Helpers\General::menuTag($name);
    }
}

if (!function_exists('getMenuTag'))
{
    /**
     * @return mixed
     */
    function getMenuTag() {
        return App\Helpers\General::getMenuTag();
    }
}

if (!function_exists('YoutubeTakeID'))
{
    /**
     * @param $url
     * @return mixed|string
     */
    function YoutubeTakeID($url) {
        return App\Helpers\General::YoutubeTakeID($url);
    }
}

if (!function_exists('alertShow'))
{
    /**
     * @param $title
     * @param $message
     * @return string
     */
    function alertShow($title, $message){
        return App\Helpers\General::alertShow($title, $message);
    }
}

if (!function_exists('returnSelectId'))
{
    /**
     * @param $value_id
     * @param $value_other
     * @return mixed|string
     */
    function returnSelectId($value_id, $value_other){
        return App\Traits\AdminUsersParticipant::returnSelectId($value_id, $value_other);
    }
}

if (!function_exists('returnSelectOther'))
{
    /**
     * @param $value_id
     * @param $value_other
     * @return mixed|string
     */
    function returnSelectOther($value_id, $value_other){
        return App\Traits\AdminUsersParticipant::returnSelectOther($value_id, $value_other);
    }
}

if (!function_exists('isBase64'))
{
    /**
     * @param $s
     * @return bool
     */
    function isBase64($s){
        return App\Helpers\General::isBase64($s);
    }
}

if (!function_exists('segmentCompany'))
{
    /**
     * segment company
     */
    function segmentCompany()
    {
        return App\Helpers\General::segmentCompany();
    }
}

if(!function_exists('makeICName'))
{
    function makeICName($name, $size = 80, $bold = true, $rounded = false, $color = 'ffffff', $background = null)
    {
        return App\Helpers\General::makeICName($name, $size, $background, $color, $bold, $rounded);
    }
}

if(!function_exists('generateSignature'))
{
    function generateSignature($api_key, $api_secret, $meeting_number, $role)
    {
        //Set the timezone to UTC
        date_default_timezone_set("UTC");
        //time in milliseconds (or close enough)
        $time = time() * 1000 - 30000;

        $data = base64_encode($api_key . $meeting_number . $time . $role);
        $hash = hash_hmac('sha256', $data, $api_secret, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }
}

if (!function_exists('getContentYoutube'))
{
    /**
     * get data youtube from api
     *
     * @param $youtube_id
     * @return Object
     */
    function getContentYoutube($youtube_id)
    {
        return App\Helpers\General::getContentYoutube($youtube_id);
    }
}

if (!function_exists('socialShare'))
{
    /**
     * share button media social
     *
     * @param $social
     * @param $link
     * @param string $title
     * @return string
     */
    function socialShare($social, $link, $title = '')
    {
        return App\Helpers\General::socialShare($social, $link, $title);
    }
}

if (!function_exists('showMessage'))
{
    /**
     * return message
     *
     * @return string
     */
    function showMessage()
    {
        return App\Helpers\General::showMessage();
    }
}

if (!function_exists('changePercent'))
{
    /**
     * change to percent
     *
     * @param float $val
     * @return float|int
     */
    function changePercent(float $val)
    {
        if (!empty($val)) {
            if ($val > 0) {
                return $val/100;
            }
        }
        return 0;
    }
}

if (!function_exists('makeValuePercent'))
{
    /**
     * get value percent
     *
     * @param float $val
     * @param $percent
     * @return float|int
     */
    function makeValuePercent(float $val, $percent)
    {
        if (!empty($val)) {
            if ($val > 0) {
                if (!empty($percent)) {
                    return $val*$percent;
                } else {
                    return $val;
                }
            }
        }
        return 0;
    }
}

if (!function_exists('getValuePercent'))
{
    /**
     * get value percent
     *
     * @param float $val
     * @param $percent
     * @return float|int
     */
    function getValuePercent(float $val, $percent)
    {
        if (!empty($val)) {
            if ($val > 0) {
                if (!empty($percent)) {
                    $val_percent = $val*$percent;
                    return $val - $val_percent;
                } else {
                    return $val;
                }
            }
        }
        return 0;
    }
}

if (!function_exists('showMessageRes'))
{
    /**
     * return message
     *
     * @return string
     */
    function showMessageRes()
    {
        return App\Helpers\General::showMessageRes();
    }
}

if (!function_exists('isMobile'))
{
    /**
     * return is in mobile or not
     *
     * @return string
     */
    function isMobile()
    {
        return App\Helpers\General::isMobile();
    }
}

if (!function_exists('getFileSizeInMb'))
{
    /**
     * return is in mobile or not
     * 
     * @param $path
     * @return string
     */
    function getFileSizeInMb($path)
    {
        return App\Helpers\General::getFileSizeInMb($path);
    }
}

