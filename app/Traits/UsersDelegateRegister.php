<?php

namespace App\Traits;

use App\Repositories\MsPrefixEmail as TraitRepoMsPrefixEmail;

trait UsersDelegateRegister
{
    /**
     * return null or empty
     * @param $value
     * @return mixed|string
     */
    public static function returnNull($value)
    {
        if ($value == "null") {
            return "";
        } elseif ($value == null) {
            return "";
        } else {
            return $value;
        }
    }

    /**
     * check value register
     * @param $value
     * @param $other_value
     * @param $object_value
     * @return Object
     */
    public static function checkValueSelect($value, $other_value, $object_value)
    {
        $value = self::returnNull($value);
        $other_value = self::returnNull($other_value);

        if ($value == "Other") {
            $id = "";
            $name = $other_value;
        } else {
            if (!empty($object_value)) {
                $id = (!empty($object_value->id)?$object_value->id:"");
                $name = (!empty($object_value->name)?$object_value->name:"");
            } else {
                $id = "";
                $name = "";
            }
        }

        return self::returnObject($id, $name);
    }

    /**
     * retun value to object
     * @param $id
     * @param $name
     * @return Object
     */
    public static function returnObject($id, $name):Object
    {
        return (object) [
            "id" => $id,
            "name" => $name,
        ];
    }

    /**
     * check is email in exeption prefix email
     * @param $email
     * @return bool
     */
    public static function isExceptEmailPrefix($email)
    {
        $res = false;
        $data = TraitRepoMsPrefixEmail::listAll();
        foreach ($data as $x => $row)
        {
            $find = stristr($email, $row->name);
            if (!empty($find)) {
                $res = true;
                break;
            }
        }
        return $res;
    }

    /**
     * list prefix email validation
     * @return string
     */
    public static function listStringPrefix()
    {
        $data = TraitRepoMsPrefixEmail::listArray();
        return implode(', ', $data);
    }
}
