<?php namespace Codivex\Observers;

use Auth;
class StockObserver extends BaseObserver implements ObserverInterface{
    public function updated($model){
        $this->createLog(Auth::user()->id, "Update Stock");
    }
    public function created($model){
        $this->createLog(Auth::user()->id, "Created Stock");
    }
    public function deleted($model){
        $this->createLog(Auth::user()->id, "Delete Stock");
    }
}