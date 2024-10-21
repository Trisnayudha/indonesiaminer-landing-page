<?php

namespace App\Traits;


trait AdminUsersParticipant
{
    /**
     * @param $value_id
     * @param $value_other
     * @return mixed|string
     */
    public static function returnSelectId($value_id, $value_other)
    {
        return (!empty($value_id != 0)?$value_id:(!empty($value_id == 0) && !empty($value_other)?'Other':''));
    }

    /**
     * @param $value_id
     * @param $value_other
     * @return mixed|string
     */
    public static function returnSelectOther($value_id, $value_other)
    {
        return (!empty($value_id == 0) && !empty($value_other)?$value_other:'');
    }
}
