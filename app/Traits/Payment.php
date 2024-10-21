<?php

namespace App\Traits;

trait Payment
{
    public static function returnInt($value)
    {
        return (!empty($value)?$value:0);
    }

    /**
     * @param $package_name
     * @param $events_id
     * @return bool
     */
    public static function checkQuotaUsers($package_name, $events_id)
    {
        $countEvents = \App\Repositories\Payment::countPaymentByPackage($package_name, $events_id);
        $findEvents = \App\Repositories\Events::findById($events_id);
        $quota_silver = self::returnInt($findEvents->silver_quota_users);
        $quota_gold = self::returnInt($findEvents->gold_quota_users);
        $quota_platinum = self::returnInt($findEvents->platinum_quota_users);

        $quota = false;
        if ($package_name == 'Platinum') {
            if ($countEvents >= $quota_platinum) {
                $quota = true;
            }
        } elseif ($package_name == 'Gold') {
            if ($countEvents >= $quota_gold) {
                $quota = true;
            }
        } elseif ($package_name == 'Silver') {
            if ($countEvents >= $quota_silver) {
                $quota = true;
            }
        }
        return $quota;
    }

    public static function checkQuotaUsersNew($events_tickets_type, $events_id, $events_tickets_id)
    {
        $countEvents = \App\Repositories\Payment::countPaymentByEventType($events_tickets_type, $events_id);
        // $findEvents = \App\Repositories\Events::findById($events_id);
        $findEvents = \App\Repositories\EventsTickets::findById($events_tickets_id);
        $quota_silver = self::returnInt($findEvents->quota_users);
        $quota_gold = self::returnInt($findEvents->quota_users);
        $quota_platinum = self::returnInt($findEvents->quota_users);

        $quota = false;
        if ($events_tickets_type == 'Platinum') {
            if ($countEvents >= $quota_platinum) {
                $quota = true;
            }
        } elseif ($events_tickets_type == 'Gold') {
            if ($countEvents >= $quota_gold) {
                $quota = true;
            }
        } elseif ($events_tickets_type == 'Silver') {
            if ($countEvents >= $quota_silver) {
                $quota = true;
            }
        }
        return $quota;
    }

    /**
     * @param $events_id
     * @return bool
     */
    public static function checkPaymentUsers($events_id)
    {
        $users_id = getSessionDelegate('login_id');
        $findEvents = \App\Repositories\Payment::findByPaymentEvents('Waiting', $events_id, $users_id);
        if (!empty($findEvents->id)) {
            return true;
        }
        return false;
    }

    public static function checkPaymentCompany($events_id)
    {
        $users_id = getSessionDelegate('login_id');
        $findEvents = \App\Repositories\Payment::findByPaymentEventsCompany($events_id, $users_id);
        if (!empty($findEvents->id)) {
            return true;
        }
        return false;
    }

    /**
     * @param $events_id
     * @return bool
     */
    public static function checkPayedPayment($events_id)
    {
        $users_id = getSessionDelegate('login_id');
        $findEvents = \App\Repositories\Payment::findPayedPaymentEvents($events_id, $users_id);
        if (!empty($findEvents->id)) {
            return true;
        }
        return false;
    }

    public static function checkPayedPaymentRegisterCompany()
    {
        $users_id = getSessionDelegate('login_id');
        $findPayment = \App\Repositories\Payment::findValidPaymentRegistrationCompany($users_id);
        if (!empty($findPayment->id)) {
            return true;
        }
        return false;
    }

    public static function checkRunningPayment($type,$events_id = null)
    {
        $company_id = getSessionDelegate('login_id');
        $findPayment = \App\Repositories\Payment::findRunningPayment($company_id,$type,$events_id);
        if (!empty($findPayment->id)) {
            return $findPayment;
        }
        return false;
    }
}
