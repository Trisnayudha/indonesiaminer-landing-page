<?php

namespace App\Services;

use App\Repositories\Events;
use App\Traits\Events as TraitEvents;
use Illuminate\Support\Facades\DB;

class EventsService extends Events
{
    use TraitEvents;

    public static function paginateWithFilter($search, $events_list, $events_type, $events_tags, $filter = null, $country = null, $users_id = null, $is_company = null)
    {
        if ($is_company) {
            $data = Events::paginateWithFilterCompany($search, $events_list, $events_type, $events_tags, $filter, $country, $users_id);
        } else {
            $data = Events::paginateWithFilter($search, $events_list, $events_type, $events_tags, $filter, $country, $users_id);
        }
        foreach ($data as $x => $row) {
            $date_end = date('Y-m-d', strtotime($row->date_end));
            $row->isUpcoming = (new \DateTime($date_end) >= new \DateTime(date('Y-m-d')) ? true : false);
            $row->isRegistered = (in_array($row->payment_status, ['Paid Off', 'Free']) && !empty($users_id) ? true : false);

            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_start_events = (!empty($row->date_start) ? date('Y-m-d', strtotime($row->date_start)) : '');
            $row->date_start = (!empty($row->date_start) ? date('d M Y', strtotime($row->date_start)) : '');
            $row->date_end = (!empty($row->date_end) ? date('d M Y', strtotime($row->date_end)) : '');
        }
        return $data;
    }

    public static function listRelateEvents($id, $type_id)
    {
        $data = Events::listRelateEvents($id, $type_id);
        foreach ($data as $x => $row) {
            $date_end = date('Y-m-d', strtotime($row->date_end));
            $row->isUpcoming = (new \DateTime($date_end) >= new \DateTime(date('Y-m-d')) ? true : false);

            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_start = (!empty($row->date_start) ? date('d M Y', strtotime($row->date_start)) : '');
            $row->date_end = (!empty($row->date_end) ? date('d M Y', strtotime($row->date_end)) : '');
        }
        return $data;
    }

    public static function detailForm($id)
    {
        $data = Events::detailForm($id);
        if (!empty($data)) {
            $data->gold_price_rupiah = (float) $data->gold_price_rupiah;
            $data->gold_price_rupiah_company = (float) $data->gold_price_rupiah_company;
            $data->gold_price_dollar = (float) $data->gold_price_dollar;
            $data->gold_price_dollar_company = (float) $data->gold_price_dollar_company;
            $data->platinum_price_rupiah = (float) $data->platinum_price_rupiah;
            $data->platinum_price_rupiah_company = (float) $data->platinum_price_rupiah_company;
            $data->platinum_price_dollar = (float) $data->platinum_price_dollar;
            $data->platinum_price_dollar_company = (float) $data->platinum_price_dollar_company;
        }
        return $data;
    }

    public static function findPriceById($id, $currency = 'Rupiah', $type = 'Silver', $is_company = null)
    {
        // update curs events
        self::updateCursEvent($id);

        $data = Events::findPriceById($id);
        if (!empty($data)) {
            if ($type == 'Silver') {
                return 0;
            } else if ($type == 'Gold') {
                if ($currency == 'Rupiah') {
                    return $is_company ? $data->gold_price_rupiah_company : $data->gold_price_rupiah;
                } else {
                    return $is_company ? $data->gold_price_dollar_company : $data->gold_price_dollar;
                }
            } else if ($type == 'Platinum') {
                if ($currency == 'Rupiah') {
                    return $is_company ? $data->platinum_price_rupiah_company : $data->platinum_price_rupiah;
                } else {
                    return $is_company ? $data->platinum_price_dollar_company : $data->platinum_price_dollar;
                }
            }
        }
        return 0;
    }

    public static function listUpcomingEvents($id = null)
    {
        $data = Events::listUpcomingEvents($id);
        foreach ($data as $x => $row) {
            $date_end = date('Y-m-d', strtotime($row->date_end));
            $row->isUpcoming = (new \DateTime($date_end) >= new \DateTime(date('Y-m-d')) ? true : false);

            $row->name = (strlen($row->name) > 100 ? substr($row->name, 0,  100) . '...' : $row->name);
            $row->image = (!empty($row->image) ? asset('storage/' . $row->image) : '');
            $row->date_start_events = (!empty($row->date_start) ? date('Y-m-d', strtotime($row->date_start)) : '');
            $row->date_start = (!empty($row->date_start) ? date('d M Y', strtotime($row->date_start)) : '');
            $row->date_end = (!empty($row->date_end) ? date('d M Y', strtotime($row->date_end)) : '');
        }
        return $data;
    }

    public static function paginateWithFilterInTransation($users_id, $search, $events_list, $events_type, $events_tags, $filter = null, $country = null, $condition = null)
    {
        $data = parent::paginateWithFilterInTransation($users_id, $search, $events_list, $events_type, $events_tags, $filter, $country, $condition);
        foreach ($data as $x => $row) {
            $date_end = date('Y-m-d', strtotime($row->date_end));
            $row->isUpcoming = (new \DateTime($date_end) >= new \DateTime(date('Y-m-d')) ? true : false);
            $row->isRegistered = (in_array($row->payment_status, ['Paid Off', 'Free']) ? true : false);
            $row->status_event = $row->status_event;
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_start = (!empty($row->date_start) ? date('d M Y', strtotime($row->date_start)) : '');
            $row->date_end = (!empty($row->date_end) ? date('d M Y', strtotime($row->date_end)) : '');
        }
        return $data;
    }
}
