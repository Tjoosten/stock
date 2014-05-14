<?php namespace Codivex\Handlers;

use Eventlog;
use User;
use Auth;

class UserEventHandler {

    public function writeLog($statusCode, $table, $name, $changed = null)
    {
        Eventlog::create([
            'user_id'   =>  Auth::user()->id,
            'action'    =>  $this->msgGenerator($statusCode, $table, $name, $changed)
        ]);
    }

    protected function msgGenerator($statusCode, $table, $name, $changed = null)
    {
        $out = "tabel <strong>$table</strong> de volgende record <strong>$name</strong> ";
        switch($statusCode)
        {
            // Create
            case 101:
                $out .= "aangemaakt.";
                break;
            // Update
            case 201:
                $out .= "gewijzigd naar <strong>$changed</strong>.";
                break;
            // Delete
            case 301:
                $out .= "verwijdert.";
                break;
        }

        return $out;
    }

    public function subscribe($events)
    {
        $events->listen('user.log', 'Codivex\Handlers\UserEventHandler@writeLog');
    }
} 