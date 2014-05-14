<?php namespace Codivex\Observers;

interface ObserverInterface {
    public function updated($model);
    public function created($model);
    public function deleted($model);
} 