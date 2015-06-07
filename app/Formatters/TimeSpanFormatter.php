<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 07/06/2015
 * Time: 01:14
 */

namespace App\Formatters;


use Carbon\Carbon;

class TimeSpanFormatter {

    public static function format(Carbon $then, Carbon $now = null, $short = false) {
        if(!$now) {
            $now = new Carbon();
        }

        $diff = $now->diff($then);

        if($diff->d > 7) {
            /*
             * More then 7 days have elapsed so just return full date
             */
            return $then->format('d/m/Y');
        }
        else {
            /*
             * We'll return 1 of these formatted units, depending on how much time has passed
             */
            $steps = array(
                'd' => array(
                    'long' => array('1 day ago', '%d days ago'),
                    'short' => '%dd'
                ),
                'h' => array(
                    'long' => array('1 hour ago', '%h hours ago'),
                    'short' => '%hh'
                ),
                'i' => array(
                    'long' => array('1 minute ago', '%i minutes ago'),
                    'short' => '%im'
                ),
                's' => array(
                    'long' => array('1 second ago', '%s seconds ago'),
                    'short' => '%ss'
                )
            );

            /*
             * Start at the largest unit (days) and work down
             */
            foreach($steps as $var => $messages) {
                /*
                 * If the unit has passed 1 (i.e 1 day) then return that
                 */
                if($diff->$var > 0) {
                    if($short) {
                        /*
                         * Short form
                         */
                        return $diff->format($messages['short']);
                    }

                    if($diff->$var === 1) {
                        /*
                         * Long, non-plural
                         */
                        return $messages['long'][0];
                    }
                    else {
                        /*
                         * Long, plural
                         */
                        return $diff->format($messages['long'][1]);
                    }
                }
            }
        }

    }

}