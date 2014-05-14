<?php namespace Codivex\Observers;

use Auth;

class RegistrationObserver extends BaseObserver implements ObserverInterface{
    public function updated($model){
        $this->createLog(Auth::user()->id, "Update Registration");
    }
    public function created($model){
        $this->createLog(Auth::user()->id, "Created Registration");
    }
    public function deleted($model){
        $this->createLog(Auth::user()->id, "Delete Registration");
    }
}