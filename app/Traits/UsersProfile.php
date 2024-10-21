<?php

namespace App\Traits;

use App\Repositories\Users;
use Illuminate\Support\Facades\Session;

trait UsersProfile
{
    /**
     * @param $users_id
     * @return Object
     */
    public static function detailUsers($users_id) : Object
    {
        $find = Users::detailForm($users_id);
        $name = (!empty($find->name)?$find->name:'');
        $company_name = (!empty($find->company_name)?$find->company_name:'');

        $ms_company_category_id = (!empty($find->ms_company_category_id)?$find->ms_company_category_id:0);
        $company_category = (!empty($find->company_category)?$find->company_category:'');
        $company_category_other = (!empty($find->company_category_other)?$find->company_category_other:'');
        $ms_company_category_id = returnSelectId($ms_company_category_id, $company_category_other);
        $company_category_other = returnSelectOther($company_category, $company_category_other);

        $ms_class_company_minerals_id = (!empty($find->ms_class_company_minerals_id)?$find->ms_class_company_minerals_id:0);
        $classify_minerals_name = (!empty($find->classify_minerals_name)?$find->classify_minerals_name:'');
        $classify_minerals_other = (!empty($find->classify_minerals_other)?$find->classify_minerals_other:'');
        $ms_class_company_minerals_id = returnSelectId($ms_class_company_minerals_id, $classify_minerals_other);
        $classify_minerals_other = returnSelectOther($classify_minerals_name, $classify_minerals_other);

        $ms_class_company_mining_id = (!empty($find->ms_class_company_mining_id)?$find->ms_class_company_mining_id:0);
        $classify_mining_name = (!empty($find->classify_mining_name)?$find->classify_mining_name:'');
        $classify_mining_other = (!empty($find->classify_mining_other)?$find->classify_mining_other:'');
        $ms_class_company_mining_id = returnSelectId($ms_class_company_mining_id, $classify_mining_other);
        $classify_mining_other = returnSelectOther($classify_mining_name, $classify_mining_other);

        $ms_commod_company_minerals_id = (!empty($find->ms_commod_company_minerals_id)?$find->ms_commod_company_minerals_id:0);
        $commodities_minerals_name = (!empty($find->commodities_minerals_name)?$find->commodities_minerals_name:'');
        $commodities_minerals_other = (!empty($find->commodities_minerals_other)?$find->commodities_minerals_other:'');
        $ms_commod_company_minerals_id = returnSelectId($ms_commod_company_minerals_id, $commodities_minerals_other);
        $commodities_minerals_other = returnSelectOther($commodities_minerals_name, $commodities_minerals_other);

        $ms_commod_company_minerals_coal_id = (!empty($find->ms_commod_company_minerals_coal_id)?$find->ms_commod_company_minerals_coal_id:0);
        $commodities_minerals_coal_name = (!empty($find->commodities_minerals_coal_name)?$find->commodities_minerals_coal_name:'');
        $commodities_minerals_coal_other = (!empty($find->commodities_minerals_coal_other)?$find->commodities_minerals_coal_other:'');
        $ms_commod_company_minerals_coal_id = returnSelectId($ms_commod_company_minerals_coal_id, $commodities_minerals_coal_other);
        $commodities_minerals_coal_other = returnSelectOther($commodities_minerals_coal_name, $commodities_minerals_coal_other);

        $ms_commod_company_mining_id = (!empty($find->ms_commod_company_mining_id)?$find->ms_commod_company_mining_id:0);
        $commodities_mining_name = (!empty($find->commodities_mining_name)?$find->commodities_mining_name:'');
        $commodities_mining_other = (!empty($find->commodities_mining_other)?$find->commodities_mining_other:'');
        $ms_commod_company_mining_id = returnSelectId($ms_commod_company_mining_id, $commodities_mining_other);
        $commodities_mining_other = returnSelectOther($commodities_mining_name, $commodities_mining_other);

        $ms_origin_manufactur_company_id = (!empty($find->ms_origin_manufactur_company_id)?$find->ms_origin_manufactur_company_id:0);
        $origin_manufacturer_name = (!empty($find->origin_manufacturer_name)?$find->origin_manufacturer_name:'');
        $origin_manufacturer_other = (!empty($find->origin_manufacturer_other)?$find->origin_manufacturer_other:'');
        $ms_origin_manufactur_company_id = returnSelectId($ms_origin_manufactur_company_id, $origin_manufacturer_other);
        $origin_manufacturer_other = returnSelectOther($origin_manufacturer_name, $origin_manufacturer_other);

        return (object) [
            "id" => (!empty($find->id)?$find->id:0),
            "ms_prefix_call_id" => (!empty($find->ms_prefix_call_id)?$find->ms_prefix_call_id:0),
            "call_name" => (!empty($find->call_name)?$find->call_name:''),
            "name" => $name,
            "ms_company_type_id" => (!empty($find->ms_company_type_id)?$find->ms_company_type_id:0),
            "company_type" => (!empty($find->company_type)?$find->company_type:''),
            "company_name" => $company_name,
            "job_title" => (!empty($find->job_title)?$find->job_title:''),
            "ms_phone_code_id" => (!empty($find->ms_phone_code_id)?$find->ms_phone_code_id:0),
            "phone_code" => (!empty($find->phone_code)?$find->phone_code:''),
            "phone" => (!empty($find->phone)?$find->phone:''),
            "email" => (!empty($find->email)?$find->email:''),
            "email_alternate" => (!empty($find->email_alternate)?$find->email_alternate:''),
            "website_company" => (!empty($find->website_company)?$find->website_company:''),
            "ms_company_category_id" => $ms_company_category_id,
            "company_category" => $company_category,
            "company_category_other" => $company_category_other,
            "ms_class_company_minerals_id" => $ms_class_company_minerals_id,
            "classify_minerals_name" => $classify_minerals_name,
            "classify_minerals_other" => $classify_minerals_other,
            "ms_class_company_mining_id" => $ms_class_company_mining_id,
            "classify_mining_name" => $classify_mining_name,
            "classify_mining_other" => $classify_mining_other,
            "ms_commod_company_minerals_id" => $ms_commod_company_minerals_id,
            "commodities_minerals_name" => $commodities_minerals_name,
            "commodities_minerals_other" => $commodities_minerals_other,
            "ms_commod_company_minerals_coal_id" => $ms_commod_company_minerals_coal_id,
            "commodities_minerals_coal_name" => $commodities_minerals_coal_name,
            "commodities_minerals_coal_other" => $commodities_minerals_coal_other,
            "ms_commod_company_mining_id" => $ms_commod_company_mining_id,
            "commodities_mining_name" => $commodities_mining_name,
            "commodities_mining_other" => $commodities_mining_other,
            "ms_origin_manufactur_company_id" => $ms_origin_manufactur_company_id,
            "origin_manufacturer_name" => $origin_manufacturer_name,
            "origin_manufacturer_other" => $origin_manufacturer_other,
            "ms_company_project_type_id" => (!empty($find->ms_company_project_type_id)?$find->ms_company_project_type_id:0),
            "project_type" => (!empty($find->project_type)?$find->project_type:''),
            "ms_country_id" => (!empty($find->ms_country_id)?$find->ms_country_id:0),
            "country" => (!empty($find->country)?$find->country:''),
            "ms_state_id" => (!empty($find->ms_state_id)?$find->ms_state_id:0),
            "state" => (!empty($find->state)?$find->state:''),
            "ms_city_id" => (!empty($find->ms_city_id)?$find->ms_city_id:0),
            "city" => (!empty($find->city)?$find->city:''),
            "post_code" => (!empty($find->post_code)?$find->post_code:''),
            "company_address" => (!empty($find->company_address)?$find->company_address:''),
            "company_phone" => (!empty($find->company_phone)?$find->company_phone:''),
            "logo_company_origin" => (!empty($find->logo_company_origin)?asset($find->logo_company_origin):makeICName($company_name, 200)),
            "logo_company_cropping" => (!empty($find->logo_company_cropping)?asset($find->logo_company_cropping):makeICName($company_name, 200)),
            "image_users" => (!empty($find->image_users)?asset($find->image_users):makeICName($name, 200)),
            "image_users_crop" => (!empty($find->image_users_crop)?asset($find->image_users_crop):makeICName($name, 200)),
            "with_information" => (!empty($find->with_information)?$find->with_information:''),
            "bio_desc" => (!empty($find->bio_desc)?$find->bio_desc:''),
            "is_verification" => (!empty($find->is_verification)?$find->is_verification:''),
            "created_at" => (!empty($find->created_at)?$find->created_at:''),
        ];
    }

    /**
     * @param $page
     * @return mixed
     */
    public static function setPageProfileBookmark($page)
    {
        if (!Session::has('pBookmark')) {
            Session::put('pBookmark', $page);
        }
        return $page;
    }

    /**
     * @return mixed
     */
    public static function getPageProfileBookmark()
    {
        return Session::get('pBookmark');
    }

}
