<?php

namespace App\Traits;

trait PaymentRegisterSponsors
{
    /**
     * check is payment register sponsors waiting exists
     *
     * @param $company_id
     * @return bool
     */
    public static function checkIsWaitingPayment($company_id)
    {
        $find = \App\Repositories\CompanyRegPay::findBy(['company_id' => $company_id, 'status' => 'Waiting']);
        if (!empty($find->id))
            return true;
        return false;
    }

    /**
     * check is payment register sponsors payed exists
     *
     * @param $company_id
     * @return bool
     */
    public static function checkIsPayedPayment($company_id)
    {
        $find = \App\Repositories\CompanyRegPay::checkIsPayedPayment($company_id);
        if (!empty($find->id))
            return true;
        return false;
    }

    /**
     * check is register sponsor payment or not
     *
     * @param $code_payment
     * @return bool
     */
    public static function checkIsPaymentRegSponsor($code_payment)
    {
        if (strpos($code_payment, 'AdditionalOrder-') !== false)
            return true;
        return false;
    }

    public static function checkIsPaymentMiningDirectory($code_payment)
    {
        if (strpos($code_payment, 'SPONSOR-') !== false)
            return true;
        return false;
    }

    /**
     * find usage plan sponsors
     *
     * @param $package
     * @return mixed
     */
    public static function checkUsagePlan($package)
    {
        $plan_trial = \crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('usage_plan_trial_regis');
        $plan_gold = \crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('usage_plan_gold_regis');
        $plan_platinum = \crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('usage_plan_platinum_regis');
        if (in_array($package, ['Trial']))
            return $plan_trial;
        elseif (in_array($package, ['Gold']))
            return $plan_gold;
        elseif (in_array($package, ['Platinum']))
            return $plan_platinum;
    }

    public static function generateExpiredUsagePlanDate($package)
    {
        date_default_timezone_set('Asia/Jakarta');
        $plan = self::checkUsagePlan($package);
        return date('Y-m-d H:i:s', strtotime("+$plan months"));
    }
}
