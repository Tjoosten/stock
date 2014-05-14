<?php namespace Codivex\Observers;
use Eventlog;
use Auth;

abstract class BaseObserver {
    protected function createLog($user_id, $action)
    {
        if(Auth::check())
        {

            Eventlog::create([
                'user_id'   =>  $user_id,
                'Action'    =>  $action
            ]);
        }
    }
} 