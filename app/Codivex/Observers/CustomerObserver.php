<?php namespace Codivex\Observers;

use Auth;
class CustomerObserver extends BaseObserver implements ObserverInterface{
    public function updated($model){
        $this->createLog(Auth::user()->id, "Update Customer");
    }
    public function created($model){
        $this->createLog(Auth::user()->id, "Created Customer");
    }
    public function deleted($model){
        $this->createLog(Auth::user()->id, "Delete Customer");
    }
}