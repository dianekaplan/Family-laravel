<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 12/6/2015
 * Time: 8:40 AM
 */

namespace App\Events;
use Carbon\Carbon;
use App\Login;


class UpdateLoginInfo
{

    public function handle($user) {

        if (\App::environment('production')) {
            $user->last_login = Carbon::now();
            $user->logins = ( $user->logins + 1);
            $user->save();

                Login::create([
                    'user_id' => $user->id
                ]);
        }
    }

}