<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 12/6/2015
 * Time: 8:40 AM
 */

namespace App\Events;
use Carbon\Carbon;


class UpdateLoginInfo
{

    public function handle($user) {

        if (\App::environment('local')) {
            // The environment is local
        }
            $user->last_login = Carbon::now();
            $user->logins = ( $user->logins + 1);
            $user->save();
    }

}